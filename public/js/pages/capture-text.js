$(function () {
    $("textarea[name='mind-text']").bind('keydown change', function () {
        if ($(this).val().length > 0)
        {
            $('#uploadInfo').removeClass('d-none');
        }
        else {
            $('#uploadInfo').addClass('d-none');
        }
    });
    let upload = document.getElementById('upload');
    upload.addEventListener('click', async (e) => {

        e.preventDefault();
        // Block UI
        if (!$('input[name="share"]').is(':checked'))
        {
            $('.share-section').after().find('.invalid-feedback').remove();
            $('.share-section').after().append("<span class='invalid-feedback'>You need to choose one of the above options.</span>").show()
            return false;
        }
        if (!$('#years-old').is(':checked'))
        {

            $('#years-old-label').after().find('.invalid-feedback').remove();
            $('#years-old-label').after("<span class='invalid-feedback'>You need to click above checkbox before continue.</span>").show()
            return false;
        }
        KTApp.blockPage();
        // Close the form modal
        $('#uploadModal').modal('hide');

        let fd = new FormData();
        fd.append("data", $("textarea[name='mind-text']").val());
        fd.append("share", $("input[name='share']:checked").val());
        fd.append("contribute", $("input[name='contribute']:checked").val());
        fd.append("country", $("select[name='country']").val());
        fd.append("state", $("select[name='state']").val());
        axios.post('/api/save-text', fd, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        }).then(response => {
            console.log(response);
            let data = response.data;
            KTApp.unblockPage();

            swal.fire({
                title: '',
                text: data.message,
                showCancelButton: false,
                confirmButtonText: 'Ok'
            }).then((result) => {
                if(result.value){
                    window.location.href = data.redirect;
                }
            });
        }).catch(error => {
            KTApp.unblockPage();
            let data = error.response.data;
            swal.fire({
                type: 'error',
                title: 'Something went wrong.',
                text: data.message
            });
        });
    });
});
