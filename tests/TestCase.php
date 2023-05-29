<?php

namespace BangunSoft\ProblemAlert\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use BangunSoft\ProblemAlert\Provider\ProblemAlertServiceProvider;
use BangunSoft\ProblemAlert\Exception\ProblemAlertExceptionHandler;

abstract class TestCase extends BaseTestCase
{
 protected function setUp(): void
 {
  parent::setUp();

  $this->app->register(ProblemAlertServiceProvider::class);

  $this->app->singleton(
   \Illuminate\Contracts\Debug\ExceptionHandler::class,
   ProblemAlertExceptionHandler::class
  );

  // Additional setup code specific to your package, if any
 }

 protected function getEnvironmentSetUp($app)
 {
  // Environment setup code specific to your package, if any
 }

    // Define your package-specific helper methods or custom assertions here, if any
}