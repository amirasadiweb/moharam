@extends('layout')


@section('content')
    <h3>Edit The Note</h3>
    <form method="POST" action="/notes/{{$note->id}}">

        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="form-group">
            <textarea class="form-control" name="body" title="body">{{$note->body}}</textarea>
        </div>


        <div class="form-group">
            <select name="tags[]" class="form-control" multiple="multiple">
                @foreach(\App\Tag::all() as $tag)
                    <option
                            @foreach($note->tags as $note_tag)
                                @if($tag->name == $note_tag->name)
                                selected
                                @endif
                            @endforeach

                     value="{{$tag->id}}">


                        {{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <h3>Tags</h3>
        <ul class="list">
            @foreach($note->tags as $tag)
              <li>{{$tag->name}}</li>
            @endforeach
        </ul>

        {{--@can('update',$note)--}}
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update Note</button>
        </div>
        {{--@endcan--}}

        <div class="form-group">
         <a class="btn btn-default" href="/cards/{{$note->card_id}}">Back</a>
        </div>

    </form>

@stop

