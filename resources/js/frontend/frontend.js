var csrfToken = $('meta[name="csrf_token"]').attr("content");

$(function () {
    // dynamic delete pop up
    $(".delete-item").on("click", function (e) {
        e.preventDefault();
        console.log("first");
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
                // Swal.fire({
                //     title: "Deleted!",
                //     text: "Your file has been deleted.",
                //     icon: "success",
                // });
                $.ajax({
                    url: url,
                    method: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN' : csrfToken
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
});
