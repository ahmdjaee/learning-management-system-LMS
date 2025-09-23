import "/node_modules/@vimeo/player/dist/player.min.js";

const baseUrl = $("meta[name=base_url]").attr("content");
const csrfToken = $("meta[name=csrf_token]").attr("content");
var notyf = new Notyf();

function loadingState() {
    return `
       <div class='loading-state' style='aspect-ratio: 16/9; display: flex; justify-content: center; align-items: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgb(0,0,0,0.8)'>
            <div class="spinner-border text-white" role="status" aria-live="assertive" aria-labelledby="loading-state">
                <span class="visually-hidden">Loading...</span>
            </div>
       </div>
    `;
}

function playerHtml(id, storage_type, source, file_type) {
    switch (storage_type) {
        case "youtube":
            return `
                <video
                    class="video-js vjs-default-skin"
                    id="vid1"
                    data-setup='{ "techOrder": ["youtube"], "sources": [{ "type": "video/youtube", "src": "${source}"}] }'
                    controls
                    autoplay
                ></video>
            `;
        case "vimeo":
            $("#video-holder").html(
                `<div id='vimeo-player'></div> ${loadingState()}`
            );

            const options = { url: source, loop: true };
            const player = new Vimeo.Player("vimeo-player", options);

            player
                .ready()
                .then(function () {
                    $(".loading-state").remove();
                    player.setVolume(0);
                })
                .catch(function (error) {
                    $(".loading-state").remove();
                });

            player.play().catch((err) => {
                console.warn("Error play Vimeo:", err);
            });

            return;
        case "upload" || "external_link":
            if (file_type === "pdf") {
                $("#video-holder").html(`
                    <iframe
                        src="${source}"
                        style="width:100%;height:100%;border:none;"
                        allowfullscreen
                    ></iframe>
                `);
                return;
            } else if (file_type === "file") {
                return `
                <div class="file_type position-absolute" style="display: flex; justify-content: center; align-items: center; position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                    <div class="text-center">
                        <div class="d-flex flex-column justify-content-center" style="border-radius:4px; height: 240px; width: 240px !important; box-shadow: 0 0 15px 0px rgb(0, 0, 0, 0.08) ">
                            <img class="mx-auto" style="width: 100px !important; height: fit-content !important;" src="${baseUrl}/default-files/folder.png" alt="">
                            <p class="">Type: File</p>
                            ${storage_type == 'external_link'? `<a style="width: fit-content;" href="${source}" class="common_btn mt-2 mx-auto">Download</a>` : `<a style="width: fit-content;" href="${baseUrl}/student/file-download/${id}" class="common_btn mt-2 mx-auto">Download</a>`}
                        </div>
                    </div>
                </div>`;
            }

            if (file_type === "doc") {
                renderDocxPreview(source);
                return;
            }
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

async function renderDocxPreview(source) {
    const response = await fetch(source);

    if (!response.ok) {
        notyf.error("Something when wrong, please try again later");
    }

    const blob = response.blob();

    docx.renderAsync(blob, document.getElementById("video-holder"))
        .then((x) => console.log("docx: finished"))
        .catch((e) => console.log(e));
}

function updateWatchHistory(courseId, chapterId, lessonId) {
    $.ajax({
        url: `${baseUrl}/student/update-watch-history`,
        method: "POST",
        data: {
            _token: csrfToken,
            course_id: courseId,
            chapter_id: chapterId,
            lesson_id: lessonId,
        },
        beforeSend: function () {},
        success: function (response) {},
    });
}
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
            $(".about-lesson").html(
                `<div class="spinner-border text-primary"></div>`
            );
        },
        success: function (response) {
            const htmlString = playerHtml(
                response.id,
                response.storage,
                response.file_path,
                response.file_type
            );
            $(".about-lesson").text(response.description);
            $("#video-holder").html(htmlString);

            if (videojs.getPlayers()["vid1"]) {
                videojs.getPlayers()["vid1"].dispose();
            }

            if ($("#vid1").length > 0) {
                videojs("vid1").ready();
            }
            // update watch history
            updateWatchHistory(courseId, chapterId, lessonId);

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

$(".lesson").on("click", function () {
    const courseId = $(this).data("course-id");
    const chapterId = $(this).data("chapter-id");
    const lessonId = $(this).data("lesson-id");

    $(".lesson").removeClass("active");
    $(this).addClass("active");

    window.scrollTo({ top: 0 });

    loadLesson(courseId, chapterId, lessonId, true);
});

$(".make-completion").on("click", function () {
    const courseId = $(this).data("course-id");
    const chapterId = $(this).data("chapter-id");
    const lessonId = $(this).data("lesson-id");

    $.ajax({
        url: `${baseUrl}/student/update-lesson-completion`,
        method: "POST",
        data: {
            _token: csrfToken,
            course_id: courseId,
            chapter_id: chapterId,
            lesson_id: lessonId,
        },
        beforeSend: function () {},
        success: function (response) {
            notyf.success(response.message);
        },
    });
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
