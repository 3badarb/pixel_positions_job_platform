<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\AbstractList;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jobsFeatured=Job::latest()->where('featured',true)->paginate(6, ['*'], 'featuredPage');
        $jobsNormal=Job::latest()->where('featured',false)->paginate(6, ['*'], 'normalPage');

        return view('jobs.index',[
            'jobsFeatured'=>$jobsFeatured,
            'jobs'=>$jobsNormal,
            'tags'=>Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attributes=$request->validate([
            'title'=>['required'],
            'salary'=>['required'],
            'location'=>['required'],
            'schedule'=>['required',Rule::in(['Full Time','Part Time'])],
            'url'=>['required','active_url'],
            'tags'=>['nullable'],
        ]);

        $attributes['featured']=$request->has('featured');

       $job= \Auth::user()->employer->jobs()->create(\Arr::except($attributes,'tags'));

       if($attributes['tags']??false){
           foreach (explode(',',$attributes['tags']) as $tag){
               $job->tag($tag);
           }
       }

       return redirect('/');
    }


}
