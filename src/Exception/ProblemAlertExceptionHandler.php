<?php

namespace BangunSoft\ProblemAlert\Exception;

use BangunSoft\ProblemAlert\Models\ProblemAlert;
use Whoops\Run as Whoops;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ProblemAlertExceptionHandler extends ExceptionHandler
{
 public function render($request, \Throwable $exception)
 {
  $statusCode = $exception->getCode() ?: 500;
  $url = request()->path();

  if (in_array($statusCode, config('problem.status_code') ?? []) && !in_array($url, config('problem.config') ?? [])) {
   $file = $exception->getFile();
   $line = $exception->getLine();

   ProblemAlert::addLog($statusCode,$file,$line);
  }

  return parent::render($request, $exception);
 }
}