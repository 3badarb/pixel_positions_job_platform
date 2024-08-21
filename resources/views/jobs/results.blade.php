<x-layout>
    <div class="space-y-6">
        <section>
            <h1 class="font-bold text-4xl text-center mb-10">Results</h1>
            <div class="space-y-4">
                @foreach($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
            <div class="mt-4">
                {{$jobs->links()}}
            </div>

        </section>
    </div>
</x-layout>
