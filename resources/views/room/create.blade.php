<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            <span> {{ __('Create Classrooms') }}</span>

        </h2>
    </x-slot>
    
    <form action="/room/create" method="POST" class="flex w-full max-w-3xl  mx-auto p-3 mt-10 flex-col space-y-7">

        @csrf

        <x-form-input name="name" placeholder="name"/>
        <x-form-input name="topic" placeholder="topic"/>
        <x-form-input name="description" placeholder="description"/>
        <x-form-button type="submit">Create</x-form-button>


    </form>
</x-app-layout>
