<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Course') }}
        </h2>
    </x-slot>
    @include('pages.course.partials.form-index')
</x-app-layout>
