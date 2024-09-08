@props(['jobFeatured'])

<div class="p-4 bg-white/10 rounded-xl flex flex-col text-center border border-transparent hover:border-blue-700 group transition-colors duration-300">
    <div class="text-sm flex w-full items-baseline">
        <span class="text-center">{{$jobFeatured->employer->name}}</span>
        @can('edit',$jobFeatured)
        <div class="ml-auto flex space-x-2">
            <a href="/edit/{{$jobFeatured->id}}" class="bg-white/10 text-xs rounded-xl py-1 px-2 hover:bg-white/20 transition-colors duration-200">
                Edit
            </a>
            <form action="/delete/{{$jobFeatured->id}}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-white/10 text-xs rounded-xl py-1 px-2 hover:bg-white/20 transition-colors duration-200">
                    Delete
                </button>
            </form>
        </div>
        @endcan
    </div>
    <div class="py-4">
        <h3 class="group-hover:text-blue-700 font-bold text-xl transition-colors duration-300">
            <a href="{{$jobFeatured->url}}" target="_blank">{{$jobFeatured->title}}</a>
        </h3>
        <p class="mt-5 text-sm">{{$jobFeatured->schedule}} - From {{$jobFeatured->salary}}</p>
        <p class="mt-1 text-sm">{{$jobFeatured->location}}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div class="mr-auto mt-auto space-x-1">
            @foreach($jobFeatured->tags as $tag)
                <x-tag :$tag />
            @endforeach
        </div>
        <x-employer-logo :logo="$jobFeatured->employer->logo" width="50"/>
    </div>
</div>
