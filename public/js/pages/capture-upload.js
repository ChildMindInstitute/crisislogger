let uploadInfo = document.getElementById('uploadInfo');
let DISABLED = "btn-disabled";

uploadInfo.addEventListener("click", swapModals);

function swapModals() {
    if(uploadInfo.classList.contains(DISABLED)) {
		return;
    }
    $("#myModal").modal('hide');
    setTimeout(function() {
        $("#uploadModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    }, 700);
}

function uploadButtonClicked(file, filename){
    // Do any form validation
    if(!valid()){
        return;
    }

    // Block UI
    KTApp.blockPage();
    // Close the form modal
    $('#uploadModal').modal('hide');

    // Create the new form, attach all data we need
    let fd = new FormData();
    fd.append("data", file);
    fd.append("share", $("input[name='share']:checked").val());
    fd.append("contribute", $("input[name='contribute']:checked").val());
    fd.append("voice", getParameterByName("voice"));
    fd.append("country", $("select[name='country']").val());
    fd.append("state", $("select[name='state']").val());
    console.log(getParameterByName("voice"));

	uploadInfo.classList.add(DISABLED);
    axios.post('/api/upload', fd, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(response => {
        uploadInfo.classList.remove(DISABLED);
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
                window.location.href = data.redirect;
            }
        });
    }).catch(error => {
        uploadInfo.classList.remove(DISABLED);
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

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
