<?php

namespace BangunSoft\ProblemAlert\Exception;

use BangunSoft\ProblemAlert\Models\ProblemAlert;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class ProblemAlertExceptionHandler extends ExceptionHandler
{
 public function render($request, \Throwable $exception)
 {
  if ($this->isHttpException($exception)) {
   $statusCode = $exception->getCode();
   $url = request()->path();

   if (in_array($statusCode, app('problem.status_code')) && !in_array($url, app('problem.except'))) {
    $file = $exception->getFile();
    $line = $exception->getLine();

    ProblemAlert::addLog($statusCode,$file,$line);
   }
  }

  return parent::render($request, $exception);
 }
}