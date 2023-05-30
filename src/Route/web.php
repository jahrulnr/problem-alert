<?php

use Illuminate\Support\Facades\Route;
use BangunSoft\ProblemAlert\Controller\ProblemController;

Route::middleware("auth")->group(function(){
	Route::resource("/vendor/problems", ProblemController::class);
});