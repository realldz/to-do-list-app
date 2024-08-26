<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function success($message) {
        return Response::json(['success' => 'true', 'message' => $message]);
    }
    public function fail($message) {
        return Response::json(['success' => 'false', 'message' => $message], 400);
    }

}
