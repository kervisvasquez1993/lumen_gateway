<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiResponse;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    use ApiResponse;

    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ValidationException)
        {
            return $this->convertValidationExceptionToResponse($exception, $request);
        }

        if($exception instanceof ModelNotFoundException)
        {
            $modelo = strtolower(class_basename($exception->getModel()));
            return $this->errorResponse("No existe ninguna incidencia de {$modelo} con el id solicitado", 404);
        }

       /*  if($exception instanceof AuthenticationException) 
        {
            return $this->unauthenticated($request, $exception);
        } */
        
        if($exception instanceof AuthenticationException)
        {
            return $this->errorResponse($exception->getMessage(), RESPONSE::HTTP_UNAUTHORIZED);
        }
        if($exception instanceof AuthorizationException)
        {
            return $this->errorResponse(' No posee permiso para ejecutar esta accion', 403);
        }

        if($exception instanceof NotFoundHttpException)
        {
            return $this->errorResponse('No se encontro la url especificada', 404);
        }

        if($exception instanceof MethodNotAllowedHttpException)
        {
            return $this->errorResponse('el metodo especificado no e valido', 405);
        }
        if($exception instanceof HttpException)
        {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }
        if($exception instanceof ClientException)
        {
            $messeger = $exception->getResponse()->getBody();
            $code = $exception->getCode();
            return $this->errorMessage($messeger,$code);


        }

        if($exception instanceof QueryExecuted)
        {
            $codigo = $exception->errorInfo[1];
            if($codigo == 1451)
            {
                return $this->errorResponse(' No se puede eliminar de forma permanete el recurso porque esta relacionado con algun otro', 409);
            }
            
        }

        if(config('app.debug'))
        {

            return parent::render($request, $exception);
        }

        return $this->errorResponse('Falla inesperad, intente luego',500);

        
    }

    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
      
        
        $error = $e->validator->errors()->getMessages();
        return $this->errorResponse($error, 422);
        
    }
}