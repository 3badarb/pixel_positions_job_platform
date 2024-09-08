<x-layout>
    <div class="space-y-6">
        <section class="text-center">

            @if($jobs->isEmpty())
                <h1 class="font-bold text-4xl">you haven't published any</h1>
            @else
                <h1 class="font-bold text-4xl">Your published Jobs</h1>
            @endif
        </section>
    <section>
        @if($jobs->isEmpty())

        @endif
        <div class="grid lg:grid-cols-3 gap-8 mt-6">
            @foreach($jobs as $jobFeatured)
                <x-job-card :$jobFeatured />
            @endforeach
        </div>
    </section>

    </div>
</x-layout>
