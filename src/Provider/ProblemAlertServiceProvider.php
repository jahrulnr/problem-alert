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
  /**
   * Configurations that needs to be done by user.
   */
  $this->publishes(
   [
    __DIR__.
    '/../../config/visitor.php' => config_path('visitor.php'),
   ],
   'config'
  );

  if (!class_exists('CreateProblemAlertTable')) {
   $timestamp = date('Y_m_d_His', time());

   $this->publishes([
    __DIR__.
    '/../../database/migrations/create_visits_table.php.stub' => database_path("/migrations/{$timestamp}_create_problems_table.php"),
   ], 'migrations');
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
   __DIR__.
   '/../../config/problem.php', 'problem'
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