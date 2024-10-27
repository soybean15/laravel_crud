<div>

    <div class="flex items-center justify-between overflow-hidden bg-white shadow-sm item sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ __("Employees") }}
        </div>


        <form class="flex items-center max-w-sm mx-auto" action="{{ route('admin.employees') }}" method="GET">
            <label for="search-employee" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                    </svg>
                </div>
                <input type="text" id="search-employee" name="query"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search by department, first name, last name..." value="{{ request('query') }}" />
            </div>
            <button type="submit"
                class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </form>

        <x-add-employee/>

    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Employee Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Employee
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Department
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Birthdate
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody id='employee-list'>

                @forelse ($employees as $employee)


                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-blue-500">
                        <a href="{{ route('admin.employee',['employee'=>$employee->id]) }}">
                            {{$employee->employee_code}}</a>
                    </th>
                    <td class="px-6 py-4">
                        {{$employee->full_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employee?->department->name ??'N/A' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employee->formattedBirthDate}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $employee->status}}
                    </td>
                    <td class="px-6 py-4 text-right">

                        <form action="{{ route('admin.destroy-employee', ['employee' => $employee->id]) }}"
                            method="POST" class="mt-4" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <!-- Simulate a DELETE request -->
                            <button type="submit"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                        No employees found.
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div class="m-4">
            {{ $employees->links() }}
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this employee? This action cannot be undone.');
        }
    </script>

</div>
