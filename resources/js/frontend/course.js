const baseUrl = $("meta[name=base_url]").attr("content");
const basicInfoUrl = baseUrl + "/instructor/courses/create";
const updateUrl = baseUrl + "/instructor/courses/update";

var notyf = new Notyf();

const loader = `
 <div class="modal-content text-center p-4 d-inline">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
 </div>`;

$(".course-tab").on("click", function (e) {
    e.preventDefault();
    let step = $(this).data("step");
    $(".course-form").find("input[name=next_step]").val(step);
    $(".course-form").trigger("submit");
});

$(".basic-info-form").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: basicInfoUrl,
        data: formData,
        method: "POST",
        contentType: false,
        processData: false,
        beforeSend: function (response) {},
        success: function (data) {
            if (data.status === "success") {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            const errors = xhr.responseJSON.errors;

            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },

        complete: function (response) {},
    });
});

$(".basic-info-update-form").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: updateUrl,
        data: formData,
        method: "POST",
        contentType: false,
        processData: false,
        beforeSend: function (response) {},
        success: function (data) {
            if (data.status === "success") {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            const errors = xhr.responseJSON.errors;

            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },

        complete: function (response) {},
    });
});

$(".more-info-form").on("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    $.ajax({
        url: updateUrl,
        data: formData,
        method: "POST",
        contentType: false,
        processData: false,
        beforeSend: function (response) {},
        success: function (data) {
            if (data.status === "success") {
                window.location.href = data.redirect;
            }
        },
        error: function (xhr, status, error) {
            const errors = xhr.responseJSON.errors;

            $.each(errors, function (key, value) {
                notyf.error(value[0]);
            });
        },

        complete: function (response) {},
    });
});

// show hide path input depending on source
$(document).on("change", ".storage", function (e) {
    let value = $(this).val();
    $(".source-input").val("");
    if (value === "upload") {
        $(".upload-source").removeClass("d-none");
        $(".eksternal-source").addClass("d-none");
    } else {
        $(".upload-source").addClass("d-none");
        $(".eksternal-source").removeClass("d-none");
    }
});

$(".dynamic-modal-btn").on("click", function (e) {
    e.preventDefault();
    $("#dynamicModal").modal("show");

    const courseId = $(this).data('id');
    $.ajax({
        url: baseUrl + "/instructor/course-content/:id/create-chapter".replace(':id', courseId),
        beforeSend: function (response) {
            $(".dynamic-modal-content").html(loader);
        },
        success: function (data) {
            $(".dynamic-modal-content").html(data);
        },
        error: function (xhr, status, error) {},

        complete: function (response) {},
    });
});

$(".edit-chapter").on("click", function (e) {
    e.preventDefault();
    $("#dynamicModal").modal("show");

    const chapterId= $(this).data('chapter-id');

    $.ajax({
        url: baseUrl + "/instructor/course-content/:id/edit-chapter".replace(':id', chapterId),
        beforeSend: function (response) {
            $(".dynamic-modal-content").html(loader);
        },
        success: function (data) {
            $(".dynamic-modal-content").html(data);
        },
        error: function (xhr, status, error) {},

        complete: function (response) {},
    });
});

$(".add-lesson").on("click", function (e) {
    e.preventDefault();
    $("#dynamicModal").modal("show");
    const courseId = $(this).data('course-id');
    const chapterId = $(this).data('chapter-id');
    $.ajax({
        url: baseUrl + "/instructor/course-content/create-lesson",
        data: {
            chapter_id : chapterId,
            course_id : courseId,
        },
        beforeSend: function (response) {
            $(".dynamic-modal-content").html(loader);
        },
        success: function (data) {
            $(".dynamic-modal-content").html(data);
        },
        error: function (xhr, status, error) {},

        complete: function (response) {},
    });
});

$(".edit-lesson").on("click", function (e) {
    e.preventDefault();
    $("#dynamicModal").modal("show");
    const courseId = $(this).data('course-id');
    const chapterId = $(this).data('chapter-id');
    const lessonId = $(this).data('lesson-id');
    $.ajax({
        url: baseUrl + "/instructor/course-content/edit-lesson",
        data: {
            chapter_id : chapterId,
            course_id : courseId,
            lesson_id : lessonId,
        },
        beforeSend: function (response) {
            $(".dynamic-modal-content").html(loader);
        },
        success: function (data) {
            $(".dynamic-modal-content").html(data);
        },
        error: function (xhr, status, error) {},

        complete: function (response) {},
    });
});
