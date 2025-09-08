/** const variable */
const baseUrl = $("meta[name=base_url]").attr("content");
const csrfToken = $("meta[name=csrf_token]").attr("content");
const basicInfoUrl = baseUrl + "/admin/courses/create";
const updateUrl = baseUrl + "/admin/courses/update";

var notyf = new Notyf({
    duration: "5000",
});

const loader = `
 <div class="modal-content text-center p-4 d-inline">
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
 </div>`;

/** reusable function */
function updateApproveStatus(id, status) {
    $.ajax({
        url: baseUrl + `/admin/courses/${id}/update-approval`,
        data: {
            _token: csrfToken,
            status: status,
        },
        method: "PUT",
        beforeSend: function (response) {},

        success: function (response) {
            window.location.reload();
        },
    });
}

document.addEventListener("DOMContentLoaded", function (e) {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.querySelector(".tom-select")), {
            copyClassesToDropdown: false,
            dropdownParent: "body",
            controlInput: "<input style='width: fit-content;'>",
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

/** on dom load */
$(function () {
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
        console.log("first");
        $("#dynamicModal").modal("show");

        const courseId = $(this).data("id");
        $.ajax({
            url:
                baseUrl +
                "/admin/course-content/:id/create-chapter".replace(
                    ":id",
                    courseId
                ),
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

        const chapterId = $(this).data("chapter-id");

        $.ajax({
            url:
                baseUrl +
                "/admin/course-content/:id/edit-chapter".replace(
                    ":id",
                    chapterId
                ),
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
        const courseId = $(this).data("course-id");
        const chapterId = $(this).data("chapter-id");
        $.ajax({
            url: baseUrl + "/admin/course-content/create-lesson",
            data: {
                chapter_id: chapterId,
                course_id: courseId,
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
        const courseId = $(this).data("course-id");
        const chapterId = $(this).data("chapter-id");
        const lessonId = $(this).data("lesson-id");
        $.ajax({
            url: baseUrl + "/admin/course-content/edit-lesson",
            data: {
                chapter_id: chapterId,
                course_id: courseId,
                lesson_id: lessonId,
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

    if ($(".sortable-list").length) {
        $(".sortable-list").sortable({
            item: "li",
            containtment: "parent",
            cursor: "grab",
            handle: ".dragger",
            update: function (event, ui) {
                let orderIds = $(this).sortable("toArray", {
                    attribute: "data-lesson-id",
                });

                let chapterId = ui.item.data("chapter-id");

                $.ajax({
                    url:
                        baseUrl +
                        `/admin/course-chapter/${chapterId}/sort-lesson`,
                    method: "POST",
                    data: {
                        _token: csrfToken,
                        order_ids: orderIds,
                    },
                    beforeSend: function () {},
                    success: function (res) {
                        notyf.success(res.message);
                    },
                    error: function (xhr) {
                        const message = xhr.responseJSON.message;
                        notyf.error(message);
                    },
                });
            },
        });
    }

    $(".short-chapter-btn").on("click", function () {

        $("#dynamicModal").modal("show");
        const courseId = $(this).data("course-id");

        $.ajax({
            url: baseUrl + `/admin/course-content/${courseId}/sort-chapter`,
            beforeSend: function (response) {
                $(".dynamic-modal-content").html(loader);
            },
            success: function (data) {
                $(".dynamic-modal-content").html(data);
            },
            error: function (xhr, status, error) {
                notyf.error(error);
            },
            complete: function (response) {},
        });
    });

    $(".update-approval-status").on("change", function () {
        const id = $(this).data("id");
        const status = $(this).val();
        updateApproveStatus(id, status);
    });
});
