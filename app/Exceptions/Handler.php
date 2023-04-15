<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Api\Traits\APIRestfulHandler;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use APIRestfulHandler;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // $this->reportable(function (Throwable $e) {
        //     //
        // });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if ($request->is('api/*')) {
                return response()->json([
                    'code'=>'404',
                    'message' => 'Page Not Found',
                    'data' => []
                ], 404);
            }
        });
    }
    public function render($request, Throwable $e)
    {
        /** @noinspection PhpUnreachableStatementInspection */
        $isDebug = $request->get('_debug_', false);
        if (strpos(strtolower($request->getRequestUri()), 'api') !== false) {
//        dd($request->query());
            if($e instanceof AuthenticationException) {
                return $this->errorResponse($e->getMessage(), 401);
            }
            if($e instanceof ValidationException) {
                $erorrs = $e->errors();
                return $this->errorsResponse($erorrs, 422);
            }
            $code = 404;
            if(method_exists($e, 'getStatusCode')) {
                $code = $e->getStatusCode();
            }
            if(method_exists($e, 'errors')) {
                return $this->errorsResponse($e->errors(), $code);
            }
            return $this->errorResponse("Có lỗi xảy ra khi thực hiện yêu cầu. Vui lòng thử lại sau. \r\n" .
            ($isDebug ? $e->getMessage() . "\n" . $e->getTraceAsString() : ''), $code);
        }
        return parent::render($request, $e);
    }
}
