<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function __invoke()
    {
        $jobs=Job::where('title','like','%'.\request('q').'%')->latest()->paginate(10);

        return view('jobs.results',[
            'jobs'=>$jobs
        ]);
    }
}
