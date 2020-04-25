<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="" id="exampleModalLabel">Upload File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="ConsentForm">
                <div class="modal-body" id="upload-modal">

                    <div class="form-group">
                        <h4>Would you like to contribute to science?</h4>
                        <div class="kt-radio-inline">
                            <label class="kt-radio">
                                <input type="radio" name="contribute" value="1" checked="checked"> Yes
                                <span></span>
                            </label>
                            <label class="kt-radio">
                                <input type="radio" name="contribute" value="0"> No
                                <span></span>
                            </label>
                        </div>
                        <span class="form-text text-muted small-font">If you decide to contribute your recording/text to science, you are only giving permission for (1) your data to be stored by our team, and (2) to be contacted before its use in future research (note: usage of recordings for research is limited to those 18 years and older).
                        </span>
                    </div>

                    <div class="form-group">
                        <h4>Would you like to share publicly?</h4>
                        <div class="kt-radio-inline">
                            @if(!request()->has('type'))
                                <label class="kt-radio">
                                    <input type="radio" name="share" value="1" checked="checked"> Yes -- recording +
                                    transcript
                                    <span></span>
                                </label>
                                <label class="kt-radio">
                                    <input type="radio" name="share" value="2"> transcript only
                                    <span></span>
                                </label>
                            @else
                                <label class="kt-radio">
                                    <input type="radio" name="share" value="1" checked="checked"> Yes
                                    <span></span>
                                </label>
                            @endif
                            <label class="kt-radio">
                                <input type="radio" name="share" value="0"> No
                                <span></span>
                            </label>
                        </div>
                        <span class="form-text text-muted small-font" >If Yes -- The Child Mind Institute and its partners may share your text or recording through their websites and social media channels. If No, your story will not be publicly shared in any form.</span>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="years-old" id="years-old" >
                        <label for="years-old" id="years-old-label">I am at least 16 years old.</label>
                    </div>
                    <div class="modal-footer" style="border-bottom: 1px solid #ebedf2;">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"
                                id="upload"> {{!request()->has('type')? 'Upload' : 'Continue'}}</button>
                    </div>

                    <a class="form-text  text-muted collapse-header collapsed" data-toggle="collapse" href="#terms-collapse" role="button"
                       aria-expanded="false" aria-controls="collapseExample" id="terms-btn">
                        <span class="form-text small-font">By clicking {{!request()->has('type')? 'Upload' : 'Continue'}} button, you agree to the terms below:  </span>
                    </a>
                    <div class="collapse" id="terms-collapse">
                        <br>
                        <span class="text-muted small-font">
                            <i>Child Mind Institute, Inc., Child Mind Medical Practice, PLLC, Child Mind Medical
                                Practice, PC, and partners (together, “CMI”) does not directly or indirectly
                                practice medicine or dispense medical advice as part of this tool. CMI assumes no
                                liability for any diagnosis, treatment, decision made, or action taken in reliance
                                upon this tool, and assumes no responsibility for your use of this tool. If you do
                                need immediate help, please contact a local care provider. If you have opted to
                                share your data publicly, you release CMI from any claims arising out of the use of
                                your story. You have the right to agree to these terms in your own name or, if
                                applicable, on behalf of your child.
                            </i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
