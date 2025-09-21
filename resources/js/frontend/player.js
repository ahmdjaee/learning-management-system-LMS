import "/node_modules/@vimeo/player/dist/player.min.js";

const baseUrl = $("meta[name=base_url]").attr("content");
const csrfToken = $("meta[name=csrf_token]").attr("content");

// function playerHtml(storage_type, source) {
//     switch (storage_type) {
//         case "youtube":
//             return `
//                 <video
//                     class="video-js vjs-default-skin"
//                     id="vid1"
//                     data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "${source}"}] }'
//                     controls
//                     autoplay
//                     width="640"
//                     height="264"
//                 >
//                 </video>
//             `;
//         case "vimeo":

//             const options = {
//                 url: source,
//                 loop: true,
//             };

//             const player = new Vimeo.Player("video-holder", options);

//             player.setVolume(0);

//             player.on("play", function () {
//                 console.log("played the video!");
//             });
//         default:
//             break;
//     }
// }
// $(function () {
//     $(".lesson").on("click", function () {
//         const courseId = $(this).data("course-id");
//         const chapterId = $(this).data("chapter-id");
//         const lessonId = $(this).data("lesson-id");

//         $.ajax({
//             url: `${baseUrl}/student/get-lesson-content`,
//             method: "GET",
//             data: {
//                 course_id: courseId,
//                 chapter_id: chapterId,
//                 lesson_id: lessonId,
//             },
//             success: function (response) {
//                 const htmlString = playerHtml(
//                     response.storage,
//                     response.file_path
//                 );
//                 $("#video-holder").html(htmlString);

//                 if (videojs.getPlayers()["vid1"]) {
//                     videojs.getPlayers()["vid1"].dispose();
//                 }

//                 if ($("#vid1").length > 0) {
//                     videojs("vid1").ready(function () {
//                         this.play();
//                     });
//                 }
//             },
//         });
//     });
// });

function loadingState() {
    return `
       <div class='loading-state' style='aspect-ratio: 16/9; display: flex; justify-content: center; align-items: center;'>
            <div class="spinner-border text-primary" role="status" aria-live="assertive" aria-labelledby="loading-state">
                <span class="visually-hidden">Loading...</span>
            </div>
       </div>
    `;
}

function playerHtml(storage_type, source) {
    switch (storage_type) {
        case "youtube":
            return `
                <video
                    class="video-js vjs-default-skin"
                    id="vid1"
                    data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "${source}"}] }'
                    controls
                    autoplay
                    width="640"
                    height="264"
                ></video>
            `;
        case "vimeo":
            $("#video-holder").html(
                `<div id='vimeo-player'>${loadingState()}</div>`
            );

            const options = { url: source, loop: true };
            const player = new Vimeo.Player("vimeo-player", options);

            player
                .loadVideo(source)
                .then(function (id) {
                    $("#vimeo-player .loading-state").remove();
                })
                .catch(function (error) {
                    $("#vimeo-player .loading-state").remove();
                });

            player.play().catch((err) => {
                console.warn("Error play Vimeo:", err);
            });

            return "";
        case "upload":
            return `
                <video
                    class="video-js vjs-default-skin"
                    id="vid1"
                    controls
                    autoplay
                >
                    <source src="${source}" type="video/mp4" />
                </video>
            `;
        default:
            return "";
    }
}

// $(function () {
//     $(".lesson").on("click", function () {
//         const courseId = $(this).data("course-id");
//         const chapterId = $(this).data("chapter-id");
//         const lessonId = $(this).data("lesson-id");

//         $.ajax({
//             url: `${baseUrl}/student/get-lesson-content`,
//             method: "GET",
//             data: { course_id: courseId, chapter_id: chapterId, lesson_id: lessonId },
//             beforeSend: function () {
//                 $("#video-holder").html(`<div style='aspect-ratio: 16/9; display: flex; justify-content: center; align-items: center;'>
//                     <div class="spinner-border text-primary" role="status" aria-live="assertive" aria-labelledby="loading-state">
//                         <span class="visually-hidden">Loading...</span>
//                     </div>
//                     </div>`);
//               },
//             success: function (response) {
//                 const htmlString = playerHtml(response.storage, response.file_path);

//                 if (response.storage !== "vimeo") {
//                     $("#video-holder").html(htmlString);

//                     if (videojs.getPlayers()["vid1"]) {
//                         videojs.getPlayers()["vid1"].dispose();
//                     }

//                     if ($("#vid1").length > 0) {
//                         videojs("vid1").ready(function () {
//                             this.play();
//                         });
//                     }
//                 }
//             },
//         });
//     });
// });

function loadLesson(courseId, chapterId, lessonId, updateHistory = true) {
    $.ajax({
        url: `${baseUrl}/student/get-lesson-content`,
        method: "GET",
        data: {
            course_id: courseId,
            chapter_id: chapterId,
            lesson_id: lessonId,
        },
        beforeSend: function () {
            $("#video-holder").html(loadingState());
        },
        success: function (response) {
            const htmlString = playerHtml(response.storage, response.file_path);

            if (response.storage !== "vimeo") {
                $("#video-holder").html(htmlString);

                if (videojs.getPlayers()["vid1"]) {
                    videojs.getPlayers()["vid1"].dispose();
                }

                if ($("#vid1").length > 0) {
                    videojs("vid1").ready();
                }
            }

            // Update URL agar bisa di-bookmark dan tombol back berfungsi
            if (updateHistory) {
                const newUrl = `${window.location.pathname}?course=${courseId}&chapter=${chapterId}&lesson=${lessonId}`;
                history.pushState(
                    { courseId, chapterId, lessonId },
                    "",
                    newUrl
                );
            }
        },
    });
}

$(function () {
    $(".lesson").on("click", function () {
        const courseId = $(this).data("course-id");
        const chapterId = $(this).data("chapter-id");
        const lessonId = $(this).data("lesson-id");

        loadLesson(courseId, chapterId, lessonId, true);
    });

    // Handle tombol Back/Forward browser
    window.onpopstate = function (event) {
        if (event.state) {
            const { courseId, chapterId, lessonId } = event.state;
            loadLesson(courseId, chapterId, lessonId, false); // jangan pushState lagi
        }
    };

    // Auto-load lesson jika URL sudah punya query params saat pertama kali buka halaman
    const params = new URLSearchParams(window.location.search);
    if (params.has("lesson")) {
        loadLesson(
            params.get("course"),
            params.get("chapter"),
            params.get("lesson"),
            false
        );
    }
});
