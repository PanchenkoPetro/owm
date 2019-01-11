<?php

namespace App\Http\Controllers;
error_reporting(0);
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'city' => 'required|max:255',
            ]);
            $url = config('owm.url');
            $value = config('owm.api_key');
            $units = config('owm.units');
            $city = $request->request->get('city');

            try{
                $client = new \GuzzleHttp\Client();
                $res = $client->get($url, [
                    'query' => [
                        'units' => $units,
                        'q' => $city,
                        'appid' => $value
                    ]]);

                $res = $res->getBody();
                $res = json_decode($res);

                View::share('res',$res);
            }catch (\Exception $e){
                Session::flash('message',$e->getCode() .' Wystąpił błąd, sprobuj ponownie przez jakiś czas.');
                Session::flash('alert-class', 'alert-danger');
            }

            return view('index');

        }
        return view('index');
    }
}
