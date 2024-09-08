@props(['job'])

<div class="p-4 bg-white/10 rounded-xl flex gap-x-4 border border-transparent hover:border-blue-700 group transition-colors duration-300">
    <!-- Employer Logo -->
    <div>
        <x-employer-logo :logo="$job->employer->logo"/>
    </div>

    <!-- Job Details -->
    <div class="flex-1 flex flex-col">
        <a class="self-start text-sm text-gray-400">{{$job->employer->name}}</a>
        <h3 class="py-1 font-bold text-xl transition-colors duration-300 group-hover:text-blue-700">
            <a href="{{$job->url}}" target="_blank">{{$job->title}}</a>
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{$job->schedule}} - From {{$job->salary}}</p>
        <p class="text-sm">{{$job->location}}</p>
    </div>

    <!-- Actions Section -->
    @can('edit', $job)
        <div class="flex flex-col space-y-2 justify-evenly mr-auto text-center">
            <a href="/edit/{{$job->id}}" class="bg-white/10 text-xs rounded-xl py-1 px-2 hover:bg-white/20 transition-colors duration-200">
                Edit
            </a>
            <form action="/delete/{{$job->id}}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-white/10 text-xs rounded-xl py-1 px-2 hover:bg-white/20 transition-colors duration-200">
                    Delete
                </button>
            </form>
        </div>
    @endcan

    <!-- Tags Section -->
    <div class="mt-auto flex flex-col space-y-2">
        <div class="flex space-x-1">
            @foreach($job->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
    </div>
</div>
