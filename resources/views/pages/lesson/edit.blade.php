<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Lesson') }}
        </h2>
    </x-slot>
    @include('pages.lesson.partials.form-edit')
</x-app-layout>
