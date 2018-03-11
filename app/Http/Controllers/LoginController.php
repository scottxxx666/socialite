<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Exception;
use Socialite;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $datas = $request->all();
        return view('login', ['datas' => $datas]);
    }

    public function line(Request $request)
    {
        $code = $request->input('code');
        $client = new Client;
        try {
            $response = $client->request('POST', 'https://api.line.me/oauth2/v2.1/token', [
                'form_params' => [
                    'code' => $code,
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => config('services.line.redirect'),
                    'client_id' => config('services.line.client_id'),
                    'client_secret' => config('services.line.client_secret'),
                ]
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        $datas = json_decode($response->getBody()->getContents());
        return view('login', ['datas' => $datas]);
    }

    public function yahooJapan(Request $request)
    {
        $code = $request->input('code');
        $client = new Client;
        try {
            $response = $client->request('POST', 'https://auth.login.yahoo.co.jp/yconnect/v2/token', [
                'form_params' => [
                    'code' => $code,
                    'grant_type' => 'authorization_code',
                    'redirect_uri' => config('services.yahoo_japan.redirect'),
                    'client_id' => config('services.yahoo_japan.client_id'),
                    'client_secret' => config('services.yahoo_japan.client_secret'),
                ]
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        $datas = json_decode($response->getBody()->getContents());
        return view('login', ['datas' => $datas]);
    }
}
