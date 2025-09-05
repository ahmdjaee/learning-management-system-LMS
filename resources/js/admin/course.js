/** const variable */
const baseUrl = $("meta[name=base_url]").attr("content");
const csrfToken = $("meta[name=csrf_token]").attr("content");

/** reusable function */
function updateApproveStatus(id, status) {
    
    $.ajax({
        url: baseUrl + `/admin/courses/${id}/update-approval`,
        data: {
            _token: csrfToken,
            status: status
        },
        method: 'PUT',
        beforeSend: function (response) {
        },
        success: function (response) {
            window.location.reload();            
        },
    });
    

}

/** on dom load */
$(function () {
    $('.update-approval-status').on('change', function () {
        const id = $(this).data('id');
        const status = $(this).val();
        updateApproveStatus(id, status)
    });
});
