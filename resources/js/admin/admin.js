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
                duration : 5000,    
                message : xhr?.responseJSON?.message
            });
        },
    });
});

$(".show-modal-icon").on("click", function (e) {
    e.preventDefault();
    $("#iconModal").modal("show");
});
