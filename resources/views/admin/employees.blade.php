<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
         <x-bread-crumbs :routes="[
            [
                'name'=>'admin.dashboard','label'=>'Dashboard'
        ],
        [
                'name'=>'admin.employees','label'=>'Employees'
        ],

         ]"/>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            @include('components.alert')


            <x-employee-list :employees='$employees'/>
        </div>
    </div>
</x-app-layout>
