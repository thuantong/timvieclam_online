<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\URL;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($this->isHttpException($exception)) {

            $statusCode = $exception->getStatusCode();
            $data['code'] = $statusCode;
            $data['title'] = 'Rất tiếc… không thể truy cập trang này';
//            dd($statusCode);
            switch ($statusCode) {

                case '404':
//                    $data['message'] = $request->path() URL;
                    $data['message'] = 'Không tìm thấy trang: '.URL::asset($request->path());
                    return response()->view('Error.404NotFound',compact('data'));
                case '401':
                    $data['message'] = '- Tài khoản của bạn không có quyền để truy cập đường dẫn: '.URL::asset($request->path());
                    return response()->view('Error.404NotFound',compact('data'));
            }
        }
        return parent::render($request, $exception);
    }
}
