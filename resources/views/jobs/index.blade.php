<x-layout>
    <div class="space-y-6">
        <section class="text-center">
            <h1 class="font-bold text-4xl">Find you next job</h1>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input  name="q" :label="false" type="text" placeholder="Web Developer..." />
            </x-forms.form>
        </section>
    <section>
        <x-section-heading>Featured jobs</x-section-heading>
        <div class="grid lg:grid-cols-3 gap-8 mt-6">
            @foreach($jobsFeatured as $jobFeatured)
                <x-job-card :$jobFeatured />
            @endforeach


        </div>
        <div class=" mt-10">
            {{$jobsFeatured->links()}}
        </div>

    </section>
    <section>
        <x-section-heading>Tags</x-section-heading>
        <div class="space-x-2 mt-4 ">
            @foreach($tags as $tag)
                <x-tag class="px-3 py-2 font-bold" :$tag />
            @endforeach
        </div>



    </section>
    <section>
        <x-section-heading>Recent Jobs</x-section-heading>
        <div class="space-y-4 mt-4">
            @foreach($jobs as $job)
                <x-job-card-wide :$job />
            @endforeach
        </div>
        <div class=" mt-10">
            {{$jobs->links()}}
        </div>
    </section>
    </div>
</x-layout>
