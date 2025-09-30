import "./cart.js";

var csrfToken = $('meta[name="csrf_token"]').attr("content");
var baseUrl = $('meta[name="base_url"]').attr("content");

$(function () {
    ezShare.execute();
    
    // dynamic delete pop up
    $(".delete-item").on("click", function (e) {
        e.preventDefault();

        let url = $(this).attr("href");

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    beforeSend: function (param) {},
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (xhr, _, error) {
                        const message = xhr.responseJSON.message;
                        notyf.error(message);
                    },
                });
            }
        });
    });

    // subscribe to newsletter
    $('.newsletter').on('submit', function (e) {
        e.preventDefault()

        let formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: `${baseUrl}/newsletter-subscribe`,
            data: formData,
            headers: {
                "X-CSRF-TOKEN": csrfToken
            },
            beforeSend: function () { 
                $('.btn-subscribe').attr('disabled', true).html("Loading...");
             },
            success: function (response) {
                notyf.success(response.message)
            },
            error: function (xhr, status, error) {
                notyf.error(xhr.responseJSON?.message)
            },
            complete: function () { 
                $('.btn-subscribe').attr('disabled', false).html("Subscribe");
                $(this).trigger('reset');  
             }
        });
    });
});
