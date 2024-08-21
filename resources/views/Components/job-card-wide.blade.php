@props(['job'])

<div class="p-4 bg-white/10 rounded-xl flex gap-x-4 border border-transparent
hover:border-blue-700 group transition-colors duration-300">
    <div>
            <x-employer-logo :logo="$job->employer->logo"/>
    </div>

    <div class=" flex-1 flex flex-col">
        <a class="self-start text-sm text-gray-400">{{$job->employer->name}}</a>
        <h3 class="py-1 font-bold text-xl transition-colors duration-300 group-hover:text-blue-700">
            <a href="{{$job->url}}" target="_blank">{{$job->title}}</a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto"> {{$job->schedule}} - From {{$job->salary}}</p>
        <p class="text-sm">{{$job->location}}</p>
    </div>
    <div class="mt-auto space-x-1">

        @foreach($job->tags as $tag)
            <x-tag :$tag />
        @endforeach


    </div>


</div>
