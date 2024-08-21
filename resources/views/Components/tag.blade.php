@props(['tag'])

<a {{$attributes->merge(['class'=>'bg-white/10 text-sm px-2 py-1
rounded-xl hover:bg-white/20 transition-colors duration-200','href'=>'/tag/'.$tag->name])}}>
    {{$tag->name}}
</a>
