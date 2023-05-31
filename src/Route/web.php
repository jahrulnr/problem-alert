<?php

use Illuminate\Support\Facades\Route;
use BangunSoft\ProblemAlert\Controller\ProblemController;

Route::group(["middleware" => config("problem.middleware")], function(){
	Route::resource("/vendor/problems", ProblemController::class);
});