<?php

namespace App\Http\Controllers;

use App\Card;
use App\Http\Requests;
use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store(Request $request,Card $card)
    {
//        return $request->all();

          $this->validate($request,[
              'body'=>'required|min:6|max:20|unique:notes']
              ,[' لطفا فیلد body را بادقت پر کنید '] ,
              ['tags'=>'required]'
          ]);

        
//        dd($request->tags);
          $note=new Note();
          $note->body=$request->body;
          $note->user_id=1;
          $card->notes()->save($note);

          $tagID=$request->tags;
          $note->tags()->sync($tagID);
//          $note->tags()->attach($tagID);

          \Session::flash('flash_message','insert the card');
//          flash('insert the card');

//        $card->notes()->create(['body'=>$request->body]);
//        $card->notes()->create($request->all());
        return back();
    }

    public function edit(Note $note)
    {
//        auth()->loginUsingId(1);
//        if (Gate::denies('edit-note', $note)){
//           abort(403,'Sory You Can not Access');
//        }

//        $this->authorize('edit-note',$note);
//        $this->authorize('update',$note);

        
        
        return view('notes/edit',compact('note'));
    }

    public function update(Note $note,Request $request)
    {
        $note->update($request->all());
        $note->tags()->sync($request->tags);
        return back();
    }
}
