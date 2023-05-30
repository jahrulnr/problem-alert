<?php

namespace BangunSoft\ProblemAlert\Tests;

use Tests\TestCase as BaseTestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Debug\ExceptionHandler;
use BangunSoft\ProblemAlert\Provider\ProblemAlertServiceProvider;
use BangunSoft\ProblemAlert\Exception\ProblemAlertExceptionHandler;
use BangunSoft\ProblemAlert\Models\ProblemAlert;

class TestCase extends BaseTestCase
{
 	public function testLib(): void
 	{
		$response = $this->json('GET', '/404_url', []);
		$response->assertStatus(404);

		$count = ProblemAlert::where('filename', '404_url')->count();
		assert($count > 0);
	}
}