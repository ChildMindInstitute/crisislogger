function valid(){
    if (!$("input[name='public']:checked").val()) {
        swal.fire({
            title: 'You missed a step..',
            text: 'Please select yes or no for post publicly.'
        });
        return false;
    }
    if (!$("input[name='transcribe']:checked").val()) {
        swal.fire({
            title: 'You missed a step..',
            text: 'Please select yes or no for transcribe.'
        });
        return false;
    }
    if (!$("input[name='share']:checked").val()) {
        swal.fire({
            title: 'You missed a step..',
            text: 'Please select yes or no for share.'
        });
        return false;
    }
    if (!$("input[name='contribute']:checked").val()) {
        swal.fire({
            title: 'You missed a step..',
            text: 'Please select yes or no for contribute.'
        });
        return false;
    }
    return true;
}
