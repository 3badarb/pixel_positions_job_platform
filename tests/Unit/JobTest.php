<?php

it('belongs to an employer', function () {
    $employer=\App\Models\Employer::factory()->create();
    $job=\App\Models\Job::factory()->create([
        'employer_id'=>$employer->id
    ]);
    expect($job->employer->is($employer))->toBeTrue();
});

it('can have tags',function (){

    $tag=\App\Models\Tag::factory()->create();
    $job=\App\Models\Job::factory()->create();

    $job->tag($tag->name);

    expect($job->tags)->toHaveCount(1);

});
