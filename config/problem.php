<?php
return [

	//except save request or route names
	'except' =>  [
  	// 'login'
 	],

 	//catch error if listed
 	'status_code' => [
		403,
		404,
		500
	],

	// who can access
	// default is web & auth
 	'middleware' => ['web', 'auth'],

 	//name of the table which visit records should save in
	'table_name' =>  'site_problems',
];