<?php

namespace App\Http\Controllers\Frontend\Tweet;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twitter;




class TweetController extends Controller
{


    public function index()
    {
        $tweets1 = Twitter::getSearch(['q' => 'اطفال_مفقودة#', 'count' => '100', 'format' => 'array']);
        $tweets2 = Twitter::getSearch(['q' => 'اطفال_مخطوفة#', 'count' => '100', 'format' => 'array']);
        return view('frontend.tweets.index',[
            'tweets1' => $tweets1,
            'tweets2' => $tweets2
        ]);
    }

   
}
