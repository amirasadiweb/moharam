@extends('Layout')

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-offset-">
            <h1>{{$card->title}}</h1>
            <ul class="list-group">

                @foreach($card->notes as $note )

                    @can('edit_froum')
                            <a href="/notes/{{$note->id}}/edit">
                    @endcan

                        <li class="list-group-item"> {{$note->body}} </li>

                    @can('edit_froum')
                        </a>
                    @endcan

                            <a href="" class="pull-right">{{$note->user->name}}</a>
                @endforeach

            </ul>



            <h3>Add Note</h3>
            <form method="POST" action="/cards/{{$card->id}}/notes">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea class="form-control" name="body" title="body">{{old('body')}}</textarea>
                </div>
                <div>

                        @if($errors->has('body'))
                          <span class="help-block">
                              {{$errors->first('body')}}
                          </span>
                        @endif

                </div>


                <div class="form-group">
                    <select name="tags[]" class="form-control" multiple="multiple">
                        @foreach(\App\Tag::all() as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Add Note</button>
                </div>



            </form>


        </div>






    </div>
@stop

@section('error')

    @if(count($errors))
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

@stop