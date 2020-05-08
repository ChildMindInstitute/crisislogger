<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateAgnostic\Arr\Support\Arr;
use PragmaRX\Countries\Package\Countries;

class CountryController extends Controller {

	//For fetching all countries
	public function getCountries() {
		$countries = new Countries();
		return $countries->all();
	}

	//For fetching states
	public function getStates($id) {
		$countries = new Countries();
		return $countries->where('ne_id', $id)
			->first()
			->hydrate('states')
			->states;
	}

	//For fetching cities
	public function getCities($id, $name) {
		$countries = new Countries();
		return $countries->where('ne_id', $id)
			->first()
			->hydrate('states')
			->states
			->where('name', $name)
			->first()
			->hydrate('cities')
			->cities;
	}


}
