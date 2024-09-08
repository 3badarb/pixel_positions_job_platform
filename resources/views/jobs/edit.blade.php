<x-layout>
    <x-page-heading>Edit Job</x-page-heading>

    <form method="post" action="/job/update/{{$job->id}}" class="max-w-2xl mx-auto space-y-6">
        @csrf
        @method('PATCH')
        <x-forms.input label="Title"  :value="$job->title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" :value="$job->salary" name="salary" placeholder="$90,000"/>
        <x-forms.input label="Location" :value="$job->location" name="location" placeholder="Florida"/>
        <x-forms.select label="Schedule"  name="schedule">
            <option class="bg-black">Part Time</option>
            <option class="bg-black">Full Time</option>

        </x-forms.select>
        <x-forms.input label="URL" name="url"  :value="$job->url" placeholder="https://google.com"/>
        <x-forms.checkbox label="Featured (Costs Extra"  :value="$job->featured" name="featured"/>
        <x-forms.input label="Tags (comma separated" :value="$job->tags->pluck('name')->implode(', ')" name="tags" placeholder="frontend, programming"/>

        <x-forms.button>Update</x-forms.button>
    </form>


</x-layout>
