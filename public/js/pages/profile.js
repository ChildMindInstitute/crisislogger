$(function () {
    $('#close-account').on('click',function (event) {
        event.preventDefault();
        swal.fire({
            title: '',
            text: 'Are you sure to delete this account from our system?'
        }).then(result => {
            if (result.value)
            {
                $(this).submit();
            }
        })
    })
})
