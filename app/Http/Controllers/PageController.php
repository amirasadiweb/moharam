<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Jobs\CompilerReports;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $pepole=['amir','ali','reza'];
        return view('welcome',compact('pepole'));
    }

    public function config(Repository $config)
    {
        return $config->get('database.default');
    }

    public function report(Request $request)
    {
        $job=new CompilerReports($request->input('reportId'));
        $this->dispatch($job);
    }
}
