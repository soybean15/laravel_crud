<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <x-bread-crumbs :routes="[
                [
                    'name'=>'admin.dashboard','label'=>'Dashboard'
            ],
            [
                    'name'=>'admin.departments','label'=>'Departments'
            ],
             ]" />
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Departments") }}
                </div>


                <form class="flex items-center max-w-sm mx-auto" action="{{ route('admin.departments') }}" method="GET">
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
                            placeholder="Search by deparment name" value="{{ request('query') }}" />
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



            </div>


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Department name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Number of Employees
                            </th>


                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($departments as $department )
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $department->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $department->employees()->count() }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                <form action="{{ route('admin.destroy-department') }}" method="POST"
                                    class="mt-4" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Simulate a DELETE request -->
                                    @if($department->employees()->count()==0)
                                    <button type="submit"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                    @endif
                                </form>
                            </td> --}}

                        </tr>
                        @empty

                        @endforelse


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
