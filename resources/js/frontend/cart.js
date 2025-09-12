/** variables */
const baseUrl = $("meta[name=base_url]").attr("content");
const csrfToken = $("meta[name=csrf_token]").attr("content");

/** reusable function */
function addToCart(courseId) { 
    $.ajax({
        url: baseUrl + "/add-to-cart/" + courseId,
        data: {
            _token: csrfToken
        },
        method: 'POST',
        beforeSend: function () {  
            $('.add-to-cart').text('Adding...');
        },
        success: function (res) {
            $('.cart-count').html(res.cart_count);
            notyf.success(res?.message)
        },

        error: function (xhr, status, error) {
            const message = xhr.responseJSON?.message;
            notyf.error(message)
            
        },
        complete: function (param) { 
            $('.add-to-cart').text('Add To Cart');
         } 
    });
 }

/** on dom load */
$(function () {

    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();
        const courseId = $(this).data('course-id');

        addToCart(courseId)
    });    
});

