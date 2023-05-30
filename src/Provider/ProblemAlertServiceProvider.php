<?php

namespace BangunSoft\ProblemAlert\Provider;

use BangunSoft\ProblemAlert\Exception\ProblemAlertExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

class ProblemAlertServiceProvider extends ServiceProvider {
 /**
  * Perform post-registration booting of services.
  *
  * @return void
  */
 public function boot() {
  if (app()->runningInConsole()) {
   $this->registerMigrations();

   $this->publishes([
    __DIR__.'/../../database/migrations' => database_path("migrations"),
   ], 'problem-migrations');

   $this->publishes(
    [
     __DIR__.'/../../config/problem.php' => config_path('problem.php'),
    ], 'problem-config'
   );
  }
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

 /**
  * Register Sanctum's migration files.
  *
  * @return void
  */
 protected function registerMigrations()
 {
  if (Sanctum::shouldRunMigrations()) {
   return $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
  }
 }
}