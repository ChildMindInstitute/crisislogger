<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Open Human data
	|--------------------------------------------------------------------------
	|
	| This is Open Humans client data for oauth
	|
	*/

	'clientId' => env('OPEN_HUMANS_CLIENT_ID'),
	'clientSecret' => env('OPEN_HUMANS_CLIENT_SECRET'),
	'redirectUri' =>'127.0.0.1:8000/openhumans/redirect',

];
