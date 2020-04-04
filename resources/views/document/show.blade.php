<h1>
    {{$document->title}}
</h1>
<p>
    {{$document->body }}
</p>

@foreach($document->adjusments as $user)

    <li>
        Email:{{$user->email}}
        On Updated: <b>{{$user->pivot->updated_at->diffForHumans()}}</b>
    </li>

@endforeach