<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="post" action="/job/create">

        <x-forms.input label="Title" name="title" placeholder="CEO"/>
        <x-forms.input label="Salary" name="salary" placeholder="$90,000"/>
        <x-forms.input label="Location" name="location" placeholder="Florida"/>
        <x-forms.select label="Schedule" name="schedule">
            <option class="bg-black">Part Time</option>
            <option class="bg-black">Full Time</option>

        </x-forms.select>
        <x-forms.input label="URL" name="url" placeholder="https://google.com"/>
        <x-forms.checkbox label="Featured (Costs Extra" name="featured"/>
        <x-forms.input label="Tags (comma separated" name="tags" placeholder="frontend, programming"/>

        <x-forms.button>Post</x-forms.button>
    </x-forms.form>


</x-layout>
