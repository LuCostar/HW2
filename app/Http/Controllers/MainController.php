<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Account;
use App\Models\Favourite;

class MainController extends BaseController
{

public function home(){
    if(!Session::get('user_id')){
        return redirect('login');
    }
    $user = Account::find(Session::get('user_id'));
    return view('home')
        ->with('username', $user->USERNAME)
        ->with('page', "home");
}

public function news() {
    if(!Session::get('user_id')){
        return redirect('login');
    }
    $user = Account::find(Session::get('user_id'));
    return view('news')->with('username', $user->USERNAME);
}

public function get_news() {
    header('Content-Type: application/json');

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://videogames-news2.p.rapidapi.com/videogames_news/recent",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: videogames-news2.p.rapidapi.com",
            "X-RapidAPI-Key: af29e088e8msh9b377e4600b8bc8p1f6517jsn8009b404465b"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

public function profile() {
    if(!Session::get('user_id')){
        return redirect('login');
    }
    $user = Account::where('ID', Session::get('user_id'))->first();
    return view('profile')->with('user', $user)->with('username', $user->USERNAME);
}

public function fetch_games(){

    $response = Favourite::where('USER', Session::get('user_id'))->get();
    return $response;
}

public function remove_game($game_id){
    if(!Session::get('user_id')){
        return redirect('login');
    }
    
    Favourite::where('ID', $game_id)->forceDelete();
}

public function search($search){

    if(!Session::get('user_id')){
        return redirect('login');
    }

    header('Content-Type: application/json');

    $curl = curl_init();
    
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://opencritic-api.p.rapidapi.com/game/search?criteria='.$search,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: opencritic-api.p.rapidapi.com",
            "X-RapidAPI-Key: f27f65598dmshfe86f82651e2982p1946fejsn3c20957364a6"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
    

}

public function show($gameId){
    header('Content-Type: application/json');

    $curl = curl_init();    


    curl_setopt_array($curl, [
        CURLOPT_URL => "https://opencritic-api.p.rapidapi.com/game/".$gameId,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: opencritic-api.p.rapidapi.com",
            "X-RapidAPI-Key: f27f65598dmshfe86f82651e2982p1946fejsn3c20957364a6"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $response;
    }
}

public function save_game(){

    if(!Session::get('user_id')){
        return redirect('login');
    }

    $favourite = new Favourite();
    $favourite->GAME = request('id');
    $favourite->USER = Session::get('user_id');
    $favourite->NAME = request('name');
    $favourite->SCORE = request('score');
    $favourite->IMAGE = request('image');
    $favourite->timestamps = false;
    $favourite->save();

    return $favourite;
    }
}