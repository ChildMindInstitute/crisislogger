<div class="form-group">
	<div class="row">

		<div class="col-sm-12">
			<label for="country">What country do you live in?</label>
			<select class="form-control" name="country" id="country">
			</select>
			@error('country')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
			@enderror
		</div>

		<div class="col-sm-12">
			<label for="state">What state do you live in?</label>
			<select class="form-control" name="state" id="state">
			</select>
			@error('state')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
			@enderror
		</div>

		<div class="col-sm-12">
			<label for="city">What city do you live in?</label>
			<select class="form-control" name="city" id="city">
			</select>
			@error('city')
			<span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
			@enderror
		</div>


	</div>
</div>
