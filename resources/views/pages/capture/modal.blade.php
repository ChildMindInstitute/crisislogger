<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Post publicly?</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" name="private" required > Yes
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="private" required> No
                            <span></span>
                        </label>
                    </div>
                    <span class="form-text text-muted">If posted publicly, other parents can hear what you have to say.</span>
                </div>
                <div class="form-group">
                    <label>May we transcribe your recording?</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" name="transcribe" required > Yes
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="transcribe" required> No
                            <span></span>
                        </label>
                    </div>
                    <span class="form-text text-muted">If posted transcribed, your recording will help a lot more people.</span>
                </div>
                <div class="form-group">
                    <label>Can we share your recording/transcripts?</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" name="share" required > Yes
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="share" required> No
                            <span></span>
                        </label>
                    </div>
                    <span class="form-text text-muted">If shared, your recording will help a lot more people.</span>
                </div>
                <div class="form-group">
                    <label>Can we recontact you?</label>
                    <div class="kt-radio-inline">
                        <label class="kt-radio">
                            <input type="radio" name="recontact" required > Yes
                            <span></span>
                        </label>
                        <label class="kt-radio">
                            <input type="radio" name="recontact" required> No
                            <span></span>
                        </label>
                    </div>
                    <span class="form-text text-muted">We will never spam you.</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="upload">Upload</button>
            </div>
        </div>
    </div>
</div>
