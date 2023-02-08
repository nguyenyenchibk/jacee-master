<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Course') }}
        </h2>
    </x-slot>
    @include('pages.course.partials.form-enroll')
</x-app-layout>
