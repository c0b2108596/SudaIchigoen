<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function googlemap() //goolge mapの外部API連携
    {
        $api_key = config('app.api_key'); //$api_keyを変数として取得
        
        return view('api.googlemap')->with(['api_key' => $api_key]);
    }
}