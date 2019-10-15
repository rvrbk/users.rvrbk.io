<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Carbon\Carbon;
use App\OauthClient;
use Symfony\Component\Yaml\Yaml;
use Response;

class SocialController extends Controller
{
    public function auth(Request $request, string $provider) 
    {
        return Socialite::driver($provider)->redirect();
    }

    public function register(Request $request, string $provider) 
    {
        $response = Socialite::driver($provider)->user();

        $user = Socialite::driver($provider)->userFromToken($response->token);

        $name = $provider . '.' . $user->id;

        $c = OauthClient::where('name', $name)->first();

        if(!$c) {
            $c = new OauthClient();
        
            $c->name = $name;
            $c->secret = hash('sha256', $name);
            $c->redirect = '';
            $c->personal_access_client = 0;
            $c->password_client = 0;
            $c->revoked = 0;

            $c->save();
        }

        $yaml = [
            'api.rvrbk.io' => [
                'client_id' => $c->id,
                'client_secret' => $c->secret
            ]
        ];
    
        return Response::make(Yaml::dump($yaml), 200, [
            'Content-type' => 'application/x-yaml', 
            'Content-Disposition' => 'attachment; filename=credentials.yaml',
            'Content-Length' => strlen(print_r($yaml, true))
        ]);
    }
}
