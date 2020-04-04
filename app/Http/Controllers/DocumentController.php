<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

use App\Http\Requests;

class DocumentController extends Controller
{
    public function show(Document $document)
    {
        return view('document.show',compact('document'));
    }
}
