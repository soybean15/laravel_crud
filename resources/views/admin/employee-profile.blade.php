<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __("Welcome $user->name") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col overflow-hidden bg-white shadow-sm item sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Employee $employee->employee_code") }}
                </div>


                <div class="p-6 ">
                    <form action="{{ route('admin.update-employee', $employee->id) }}" method="POST">
                        @csrf
                        <!-- This generates the CSRF token -->
                        @method('POST')
                        <!-- Since you are using POST in your route -->
                        <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
                            <x-input type='text' value='{{ $employee->first_name }}' attribute='first_name'
                                label="First Name" />

                            <x-input type='text' value='{{ $employee->last_name }}' attribute='last_name'
                                label="Last Name" />
                            <x-input type='text' value='{{ $employee->middle_name }}' attribute='middle_name'
                                label="Middle Name" />


                            <x-select value='{{ $employee->gender }}' attribute='gender' label="Gender" :options="
                                [
                                   [ 'value'=>'male','label'=>'Male'],
                                   [ 'value'=>'female','label'=>'Female'],
                                   [ 'value'=>'others','label'=>'others']


                                ]" />

                            <x-input type='date' value='{{ $employee->birth_date }}' attribute='birth_date'
                                label="Birthdate" />

                            <x-select value='{{ $employee->status }}' attribute='status' label="Status" :options="
                                [
                                [ 'value'=>'active','label'=>'Active'],
                                [ 'value'=>'awol','label'=>'AWOL'],
                                [ 'value'=>'inactive','label'=>'Inactive']


                                ]" />


                        </div>



                        <div class="flex justify-end">
                            <button type='submit'
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                                Submit
                            </button>
                        </div>

                    </form>

                </div>




            </div>



        </div>
    </div>
</x-app-layout>
