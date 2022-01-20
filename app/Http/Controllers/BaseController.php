<?php

namespace App\Http\Controllers;

use App\Traits\FlashMessages;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    use FlashMessages;

    protected $data = null;

    /**
     * @param $title
     * @param $subTitle
     */
    protected function setPageTitle($title, $subTitle)
    {
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    /**
     * @param  int  $errorCode
     * @param  null $message
     * @return Response
     */
    protected function showErrorPage(int $errorCode = 404, $message = null): Response
    {
        $data['message'] = $message;
        return response()->view('errors.'.$errorCode, $data, $errorCode);
    }

    /**
     * @param  bool  $error
     * @param  int   $responseCode
     * @param  array $message
     * @param  null  $data
     * @return JsonResponse
     */
    protected function responseJson(
        bool $error = true,
        int $responseCode = 200,
        array $message = [],
        $data = null
    ): JsonResponse {
        return response()->json(
            [
            'status'         =>  $error,
            'message'       => $message,
            'data'          =>  $data
            ],
            $responseCode
        );
    }

    /**
     * @param  $route
     * @param  $message
     * @param  string $type
     * @param  bool   $error
     * @param  bool   $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirect(
        $route,
        $message,
        $type = 'info',
        $error = false,
        $withOldInputWhenError = false
    ): \Illuminate\Http\RedirectResponse {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }

        return redirect()->route($route);
    }

    /**
     * @param  $message
     * @param  string $type
     * @param  bool   $error
     * @param  bool   $withOldInputWhenError
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function responseRedirectBack($message, $type = 'info', $error = false, $withOldInputWhenError = false)
    {
        $this->setFlashMessage($message, $type);
        $this->showFlashMessages();

        return redirect()->back();
    }
}
