function uploadButtonClicked(file, filename){
    // Do any form validation
    if(!valid()){
        return;
    }

    // Block UI
    KTApp.blockPage();
    // Close the form modal
    $('#uploadModal').modal('hide')

    // Create the new form, attach all data we need
    let fd = new FormData();
    fd.append("data", file);
    fd.append("public", $("input[name='public']:checked").val());
    fd.append("transcribe", $("input[name='transcribe']:checked").val());
    fd.append("share", $("input[name='share']:checked").val());
    fd.append("contribute", $("input[name='contribute']:checked").val());

    axios.post('/api/upload', fd, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
        console.log(response);
        let data = response.data;
        KTApp.unblockPage();

        swal.fire({
            title: 'Success!',
            text: data.message,
            showCancelButton: false,
            confirmButtonText: 'Ok'
        }).then((result) => {
            if(result.value){
                window.location.href = '/capture/create';
            }
        });
    }).catch(error => {
        KTApp.unblockPage();
        console.log(error.response);
        let data = error.response.data;
        swal.fire({
            type: 'error',
            title: 'Something went wrong.',
            text: data.message
        });
    });
}
