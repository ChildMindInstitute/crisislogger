@extends(isset(Auth::user()->id) ? 'layout.authorized.app' : 'layout.app')
@section('title', 'Capture Thoughts')
@section('capture-active', 'kt-menu__item--active')
@section('content')

	<div class="container">
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<h1 class="display-4">Write your thoughts and feelings</h1>
				<p><b>Please share your fears, frustrations, and needs
						during this time of crisis, as well as what is helping you to get through it.</b>
					Feel free to share any additional thoughts or feelings as you see fit.
					It will be transcribed by Google's transcription service,
					and you will be able to view a <b>word cloud</b> created from the transcript.
					You will be able to save the recording for <b>private use
						or share it publicly</b>.
					We hope that you will come back and record more.
					Please avoid using any identifying names or information.</p>

				<form method="post" action="/api/text">
					<div class="form-group">
						<textarea class="form-control" id="text" name="text" rows="3" style="min-height: 350px;"></textarea>
					</div>

					<input type="hidden" id="formshare" name="formshare">
					<input type="hidden" id="formcontribute" name="formcontribute">
					<input type="hidden" id="formvoice" name="formvoice">

					<div>
						<div id="recordingsList" class="d-none">
							<h3>Your Text:</h3>
						</div>

						<div class="text-center">
							<div class="btn-group mb-3 mt-3">
								<button id="recordButton" class="btn btn-primary">
									<i class="la la-check"></i> Done
								</button>

							</div>
						</div>

					</div>
				</form>

			</div>
		</div>
	</div>

	@include('pages.capture.modal')

@endsection


@section('scripts')
	<script>
		// set inputs to send data via form
		$("input[name='formshare']").val($("input[name='share']:checked").val());
		$("input[name='formcontribute']").val($("input[name='contribute']:checked").val());
		$("input[name='formvoice']").val(getParameterByName("voice"));


		function getParameterByName(name, url) {
			if (!url) url = window.location.href;
			name = name.replace(/[\[\]]/g, '\\$&');
			var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
				results = regex.exec(url);
			if (!results) return null;
			if (!results[2]) return '';
			return decodeURIComponent(results[2].replace(/\+/g, ' '));
		}

	</script>
@endsection
