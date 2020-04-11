@extends('layout.authorized.app')
@section('title', 'My Recordings and Word Clouds')
@section('dashboard-active', 'kt-menu__item--active')
@section('content')

	<div class="container-fluid">

		<div class="row">

			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="row">
					@foreach(Auth::user()->uploads() as $upload)
						<div class="col-sm-12 col-md-4 col-lg-3">
							<div class="kt-portlet">
								<div class="kt-portlet__head">
									<div class="kt-portlet__head-label">
										<h3 class="kt-portlet__head-title">
											{{ $upload->created_at }}
										</h3>
									</div>
								</div>
								<div class="kt-portlet__body">
									@if(Str::contains($upload->link, '.wav'))
										<audio controls src="{{ $upload->link }}"></audio>
									@else
										<video controls>
											<source src="{{ $upload->link }}" type="video/webm">
											Your browser does not support the video tag.
										</video>
									@endif
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>

			<div class="col-sm-12 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-sm-12">
						@component('components.portlet')
							<p>Your recordings were transcribed using Google's
								transcription service and are shown below as word clouds.
								The larger the size of a word, the more times you said it.</p>
						@endcomponent
					</div>
				</div>
				<div id="clouds">
					@include('components.spinner')
				</div>
			</div>


		</div>

	</div>


@endsection


@section('scripts')
	<script src="https://d3js.org/d3.v3.min.js"></script>
	<script src="https://rawgit.com/jasondavies/d3-cloud/master/build/d3.layout.cloud.js"></script>
	<script src="{{ asset('js/pages/word-clouds.js') }}?time={{ time() }}"></script>
@endsection

