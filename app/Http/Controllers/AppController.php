<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OauthClient;

class AppController extends Controller
{
    public function home(Request $request, int $id = null)
    {
        if(isset($id)) {
            $c = OauthClient::where('id', $id)->first();

            return view('home')->with(['credentials' => [
                'client_id' => $c->id,
                'client_secret' => $c->secret
            ]]);
        }

        return view('home');
    }
}
