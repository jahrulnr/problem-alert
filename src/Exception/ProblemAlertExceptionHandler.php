<?php

namespace BangunSoft\ProblemAlert\Exception;

use BangunSoft\ProblemAlert\Models\ProblemAlert;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\ControllerDoesNotReturnResponseException;
use Symfony\Component\HttpKernel\Exception\GoneHttpException;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\LockedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\HttpKernel\Exception\UnsupportedMediaTypeHttpException;

class ProblemAlertExceptionHandler extends ExceptionHandler
{
 public function render($request, \Throwable $exception)
 {
  $url = request()->path();
  $file = request()->path();
  $line = null;
  $exc = get_class($exception);
  // dd($url);

  if($exception instanceof BadRequestHttpException){
   $statusCode = 400;
  }
  elseif($exception instanceof UnauthorizedHttpException){
   $statusCode = 401;
  }
  elseif($exception instanceof AccessDeniedHttpException){
   $statusCode = 403;
  }
  elseif($exception instanceof NotFoundHttpException){
   $statusCode = 404;
  }
  elseif($exception instanceof MethodNotAllowedHttpException){
   $statusCode = 405;
  }
  elseif($exception instanceof NotAcceptableHttpException){
   $statusCode = 406;
  }
  elseif($exception instanceof ConflictHttpException){
   $statusCode = 409;
  }
  elseif($exception instanceof GoneHttpException){
   $statusCode = 410;
  }
  elseif($exception instanceof LengthRequiredHttpException){
   $statusCode = 411;
  }
  elseif($exception instanceof PreconditionFailedHttpException){
   $statusCode = 412;
  }
  elseif($exception instanceof UnsupportedMediaTypeHttpException){
   $statusCode = 415;
  }
  elseif($exception instanceof UnprocessableEntityHttpException){
   $statusCode = 422;
  }
  elseif($exception instanceof LockedHttpException){
   $statusCode = 423;
  }
  elseif($exception instanceof PreconditionRequiredHttpException){
   $statusCode = 428;
  }
  elseif($exception instanceof TooManyRequestsHttpException){
   $statusCode = 429;
  }
  elseif($exception instanceof ControllerDoesNotReturnResponseException){
   $statusCode = 500;
  }
  elseif($exception instanceof ServiceUnavailableHttpException){
   $statusCode = 503;
  }
  else{
   $statusCode = $exception->getCode() ?: 500;
   $file = $exception->getFile();
   $line = $exception->getLine();
  }

  if (in_array($statusCode, config('problem.status_code') ?? []) && !in_array($url, config('problem.config') ?? [])) {
   ProblemAlert::addLog($statusCode,$file,$line, $exc);
  }

  return parent::render($request, $exception);
 }
}