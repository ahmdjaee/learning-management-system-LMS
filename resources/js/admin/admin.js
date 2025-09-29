import $ from "jquery";

window.$ = $;
window.jQuery = $;

var notyf = new Notyf();
var csrfToken = $('meta[name="csrf_token"]').attr("content");
var deleteUrl = "";

$(".delete-item").on("click", function (e) {
    e.preventDefault();
    deleteUrl = $(this).attr("href");
    $("#modal-danger").modal("show");
});

$(".delete-confirm").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        method: "DELETE",
        url: deleteUrl,
        data: {
            _token: csrfToken,
        },
        beforeSend: function (data) {
            $(".delete-confirm").html(
                '<i class="ti ti-rotate-clockwise-2 me-1 rotate-animation" style="font-size: 20px "></i> Loading'
            );
            $(".delete-confirm").prop("disabled", true);
        },
        success: function (data) {
            window.location.reload();
        },
        complete: function (data) {
            $(".delete-confirm").html("Delete");
            $(".delete-confirm").prop("disabled", false);
        },
        error: function (xhr) {
            notyf.error({
                duration: 5000,
                message: xhr?.responseJSON?.message,
            });
        },
    });
});

$(".show-modal-icon").on("click", function (e) {
    e.preventDefault();
    $("#iconModal").modal("show");
});

document.addEventListener("DOMContentLoaded", function (e) {
    var elements = document.querySelectorAll(".tom-select");
    window.TomSelect &&
        elements.forEach(function (el) {
            new TomSelect(el, {
                sortField: {
                    field: "text",
                    direction: "asc",
                },
            });
        });

    let options = {
        selector: ".editor",
        height: 300,
        menubar: false,
        statusbar: false,
        plugins:
            "preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons",
        toolbar:
            "undo redo | formatselect | " +
            "bold italic backcolor | alignleft aligncenter " +
            "alignright alignjustify | bullist numlist outdent indent | " +
            "removeformat | blocks fontfamily fontsize",
        content_style:
            "body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }",
    };
    if (localStorage.getItem("tablerTheme") === "dark") {
        options.skin = "oxide-dark";
        options.content_css = "dark";
    }
    tinyMCE.init(options);
});
