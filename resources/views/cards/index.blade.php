@extends('Layout')

@section('content')
    <div class="row">
        <div class="col-md-3 col-lg-offset-3">
                <h1>Cards All</h1>
                @foreach(\App\Card::all() as $card)
                    <h4>
                        <a href="/cards/{{$card->id}}">
                        {{$card->title}}
                         </a>
                    </h4>
                @endforeach
       </div>
    </div>
@stop