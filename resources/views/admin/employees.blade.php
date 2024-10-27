<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Welcome $user->name") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            @include('components.alert')


            <x-employee-list :employees='$employees'/>
        </div>
    </div>
</x-app-layout>
