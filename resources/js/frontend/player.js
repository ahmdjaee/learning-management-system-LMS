const baseUrl = $("meta[name=base_url]").attr("content");
const csrfToken = $("meta[name=csrf_token]").attr("content");

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
                >
                </video>
            `;
        default:
            break;
    }
}

$(".lesson").on("click", function () {
    const courseId = $(this).data("course-id");
    const chapterId = $(this).data("chapter-id");
    const lessonId = $(this).data("lesson-id");

    $.ajax({
        url: `${baseUrl}/student/get-lesson-content`,
        method: "GET",
        data: {
            course_id: courseId,
            chapter_id: chapterId,
            lesson_id: lessonId,
        },
        success: function (response) {
            const htmlString = playerHtml(response.storage, response.file_path)
            $('.video-holder').html(htmlString);

            if(videojs.getPlayers()['vid1']) {
                videojs.getPlayers()['vid1'].dispose();
            }

            if($('#vid1').length > 0) {
                videojs('vid1').ready(function () {  
                    this.play();
                })
            }
        },
    });
});
