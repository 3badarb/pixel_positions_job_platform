<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\AbstractList;
use Illuminate\Support\Facades\Auth;

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

    public function delete(Job $job)
    {
        $job->delete();
        return redirect('/');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job'=>$job
        ]);
    }
    public function update(Request $request,Job $job)
    {
        $attributes=$request->validate([
            'title'=>['required'],
            'salary'=>['required'],
            'location'=>['required'],
            'schedule'=>['required',Rule::in(['Full Time','Part Time'])],
            'url'=>['required','active_url'],
            'tags'=>['nullable'],
        ]);

        $attributes['featured']=$request->has('featured');

        $job->update(\Arr::except($attributes,'tags'));

        $array1=array_map('trim',$job->tags->pluck('name')->toArray());
        $array2=array_map('trim',explode(',',$attributes['tags']));
        // Find elements in $array1 that are not in $array2
        $diff1 = array_diff($array1, $array2);

        // Find elements in $array2 that are not in $array1
        $diff2 = array_diff($array2, $array1);

        // Combine differences
        $differences = array_merge($diff1, $diff2);


            foreach ($differences as $tag){
                $job->tag($tag);
            }

        return redirect('/');
    }

    public function myjobs()
    {
        $user=auth()->user();
        return view('jobs.myjobs',[
            'jobs'=>$user->employer->jobs
        ]);
    }

}
