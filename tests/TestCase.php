<?php

namespace BangunSoft\ProblemAlert\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use BangunSoft\ProblemAlert\Tests\Mocks\Drivers\BarDriver;

class TestCase extends BaseTestCase
{
 protected function getPackageProviders($app)
 {
  return ['BangunSoft\ProblemAlert\Provider\ProblemAlertServiceProvider'];
 }

 protected function getPackageException($app)
 {
  return [
   'Visitor' => 'BangunSoft\ProblemAlert\Exception\ProblemAlertExceptionHandler',
  ];
 }
}