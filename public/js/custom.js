$(document).ready(function(){

    $('.select2').select2({
        minimumResultsForSearch:1/0
    });
    $('#content-privacy').css('min-height', ($('#content-area').find('.container-fluid ').height())+ 180)
    $('#share-thought-btn').click(function () {
        if ($("#share-thought-form").length > 0) // if element found on page.
        {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#share-thought-form").offset().top
            }, 1500);
        }
        else
        {
            window.location.href = '/' //if not, redirect the user into the first page.
        }

    });
    $('.contribute-to-science').click(function () {
        let $id = $(this).attr('id');
        $id = $id.split('-');
        let resource_id = $id[$id.length -1];
        let  $type = $id[$id.length -2];
        let  $contentType = $id['0'];
        if ($(this).is(':checked'))
        {
            swal.fire({
                title: ($contentType ==='contribute'? 'Are you sure you want to contribute this for science?': 'Are you sure you want to share this publicly?'),
                text: ($contentType === 'contribute'?' If Yes, you are only giving permission for (1) your data to be stored by our team, and (2) to be contacted before its use in future research.':
                        'If Public, the Child Mind Institute and its partners may share your text or recording through their websites and social media channels. If Private, your story will not be publicly shared in any form.'),
                showCancelButton: true,
                confirmButtonText:  $contentType === 'contribute' ? 'Contribute to science' : 'Public',
                cancelButtonText:  $contentType === 'contribute' ? 'Do not contribute' : 'Private',
            })
                .then(result => {
                    if (result.value)
                    {
                        const data =  { id: resource_id, type: $type, status:  1, contentType: $contentType};
                        axios.put('/api/update-resource-status', data)
                            .then(({data}) => {
                                swal.fire({
                                    type: 'success',
                                    text: "Successfully Updated"
                                });
                            })
                            .catch(error => {
                                swal.fire({
                                    type: 'error',
                                    text: "Something went wrong, please try again later"
                                })
                            })
                    }
                    else {
                        $(this).prop('checked', false)
                    }
                })
        }
        else {
            swal.fire({
                title: ($contentType ==='contribute'? 'Are you sure you do not want to contribute this for science? ': 'Are you sure you want to make this private?'),
                text: ($contentType ==='contribute'? 'Contributing to science means that you are only giving permission for (1) your data to be stored by our team, and (2) to be contacted before its use in future research.':
                    'If Public, the Child Mind Institute and its partners may share your text or recording through their websites and social media channels. If Private, your story will not be publicly shared in any form.'),
                confirmButtonText:  $contentType === 'contribute' ? 'Do not contribute' : 'Private',
                showCancelButton: true,
                cancelButtonText:  $contentType === 'contribute' ? 'Contribute to science' : 'Public',
            })
                .then(result => {
                    if (result.value)
                    {
                        const data =  { id: resource_id, type: $type, status:  0, contentType: $contentType};
                        axios.put('/api/update-resource-status', data)
                            .then(({data}) => {
                                swal.fire({
                                    type: 'success',
                                    text: "Successfully Updated"
                                });
                            })
                            .catch(error => {
                                swal.fire({
                                    type: 'error',
                                    text: "Something went wrong, please try again later"
                                })
                            })
                    }
                    else {
                        $(this).prop('checked', true)
                    }
                })
        }
    });
    $('.remove-resource').on('click', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        id = id.split('-');
        let type = id[0];
        let contentId = id[1];
        swal.fire({
            text: 'Are you sure you want to delete this?',
            confirmButtonText: 'Yes',
            showCancelButton: true,
            cancelButtonText:  'Cancel',
        })
            .then(result => {
                if (result.value) {
                    window.location.href = '/remove?id='+contentId+'&type='+type;
                }
            });
    })
    $('.text-content').on('click', function () {
        let html = $(this).text();
        html = "<p style='padding: 20px;max-height: 400px;overflow: scroll;'>"+html+"</p>"
        $('#text-content-modal').find('.modal-content').find('.modal-footer').before(html);
        $('#text-content-modal').modal('show');
    })
    $('.show-more-cloud p').on('click', function () {
        let html =  $(this).parent().parent().find('.video-box p').text();
        html = "<p style='padding: 20px;max-height: 400px;overflow: scroll;'>"+html+"</p>"
        $('#text-content-modal').find('.modal-content').find('.modal-footer').before(html);
        $('#text-content-modal').modal('show');
    })
    $('.show-more-cloud span').on('click', function () {
        if ($(this).parent().parent().find('.video-box p').hasClass('d-none'))
        {
            $(this).parent().parent().find('.video-box p').removeClass('d-none');
            $(this).parent().parent().find('.video-box div').addClass('d-none')
        }
        else {
            $(this).parent().parent().find('.video-box p').addClass('d-none');
            $(this).parent().parent().find('.video-box div').removeClass('d-none')
        }
    })
    $('#text-content-modal').on('hide.bs.modal', function (event) {
        $(this).find('.modal-content').find('p').remove();
        $(this).find('.modal-content').find('p').remove();
    })
    $('#terms-btn').click(function () {
        var scrollingElement = document.getElementById('upload-modal');
        $(scrollingElement).animate({
            scrollTop: scrollingElement.scrollHeight
        }, 500);
    })
});
