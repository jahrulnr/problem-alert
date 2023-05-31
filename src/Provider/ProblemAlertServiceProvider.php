<?php

namespace BangunSoft\ProblemAlert\Provider;

use BangunSoft\ProblemAlert\Exception\ProblemAlertExceptionHandler;
use Illuminate\Support\ServiceProvider;

class ProblemAlertServiceProvider extends ServiceProvider {
 /**
  * Perform post-registration booting of services.
  *
  * @return void
  */
 public function boot() {

  $this->publishes([
   __DIR__.'/../../database/migrations' => database_path("migrations"),
  ], 'problem-migrations');

  $this->publishes(
   [
    __DIR__.'/../../config/problem.php' => config_path('problem.php'),
   ], 'problem-config'
  );

  $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
  $this->loadRoutesFrom(__DIR__.'/../Route/web.php');
  $this->loadViewsFrom(__DIR__.'/../View', 'problem_alert');
 }

 /**
  * Register any package services.
  *
  * @return void
  */
 public function register() {
  /**
   * Load default configurations.
   */
  $this->mergeConfigFrom(
   __DIR__.'/../../config/problem.php', 'problem'
  );

  /**
   * Bind to service container.
   */
  $this->app->singleton(
   \Illuminate\Contracts\Debug\ExceptionHandler::class,
   ProblemAlertExceptionHandler::class
  );
 }
}