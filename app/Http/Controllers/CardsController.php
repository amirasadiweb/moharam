<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests;
use DB;

class CardsController extends Controller
{
    public function index()
    {
//
//        $card=DB::transaction(function (){
//            return DB::table('cards')->get();
//        });
//
//        dd($card);

        return view('cards/index');


    }

    public function show(Card $card)
    {
//        auth()->loginUsingId(1);
//        return view('cards/show');
        //return $card;
        $card->load('notes.user');
        return view('cards.show',compact('card'));
    }
}
