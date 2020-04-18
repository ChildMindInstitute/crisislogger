$(document).ready(function(){

    $('.select2').select2({
        minimumResultsForSearch:1/0
    });
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
        if ($(this).is(':checked'))
        {
            swal.fire({
                text: 'Are you sure to  make it public ?'
            })
                .then(result => {
                    if (result.value)
                    {
                        const data =  { id: resource_id, type: $type, status:  1};
                        axios.put('/api/update-resource-status', data)
                            .then(({data}) => {
                                window.location.href = data.url
                            })
                            .catch(error => {
                                swal.fire({
                                    type: 'error',
                                    text: "Something went wrong, please try again later"
                                })
                            })
                    }
                })
        }
        else {
            swal.fire({
                text: 'Are you sure to  make it private ?'
            })
                .then(result => {
                    if (result.value)
                    {
                        const data =  { id: resource_id, type: $type, status: 0};
                        axios.put('/api/update-resource-status', data)
                            .then(({data}) => {
                                window.location.href = data.url
                            })
                            .catch(error => {
                                swal.fire({
                                    type: 'error',
                                    text: "Something went wrong, please try again later"
                                })
                            })
                    }
                })
        }
    });
});
