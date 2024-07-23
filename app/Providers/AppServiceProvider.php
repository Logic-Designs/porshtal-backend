<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function($data = [], $message = '', $pagination = [], $status_code = 200) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'response' => [
                    'data' => $data,
                    'pagination' => $pagination,
                ],
            ], $status_code);
        });

        Response::macro('error', function($message = '', $errors = '', $status_code = 400) {
            return response()->json([
                'success' => false,
                'message' => $message,
                'response' => [
                    'errors' => $errors,
                ],
            ], $status_code);
        });
    }
}
