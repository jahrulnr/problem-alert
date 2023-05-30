<?php

namespace BangunSoft\ProblemAlert\Exception;

use BangunSoft\ProblemAlert\Models\ProblemAlert;
use Whoops\Run as Whoops;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProblemAlertExceptionHandler extends ExceptionHandler
{
 public function render($request, \Throwable $exception)
 {
  $url = request()->path();
  $file = request()->path();
  $line = null;

  if($exception instanceof NotFoundHttpException){
   $statusCode = 404;
  }
  elseif($exception instanceof MethodNotAllowedHttpException){
   $statusCode = 405;
  }
  else{
   $statusCode = $exception->getCode() ?: 500;
   $file = $exception->getFile();
   $line = $exception->getLine();
  }

  if (in_array($statusCode, config('problem.status_code') ?? []) && !in_array($url, config('problem.config') ?? [])) {
   ProblemAlert::addLog($statusCode,$file,$line);
  }

  return parent::render($request, $exception);
 }
}