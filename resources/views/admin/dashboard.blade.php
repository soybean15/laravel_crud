<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <x-bread-crumbs :routes="[
                [
                    'name'=>null,'label'=>'Dashboard'
            ],

             ]" />
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome $user->name!") }}
                </div>
            </div>

            <div>

                <div class="grid grid-cols-1 gap-5 mt-4 sm:grid-cols-4">
                    <x-statistic title='Total Employees' :value='$employee_count'/>
                    <x-statistic title='Total Active Employees ' :value='$active_count'/>
                    <x-statistic title='Total Inactive Employees' :value='$inactive_count'/>
                    <x-statistic title='Total Awol' :value='$awol_count'/>

                </div>

                <div class="my-5 overflow-hidden bg-white shadow sm:rounded-lg dark:bg-gray-900" >

                    <div class="grid grid-cols-1 gap-5 mt-4 sm:grid-cols-2" >

                        <x-donut-chart title='Employee count by Department' :options='$employees_by_department_options'/>

                        <x-circle-chart title='Employee count by Department' :options='$employee_status_options'/>

                    </div>
                </div>



            </div>
        </div>
    </div>
</x-app-layout>
