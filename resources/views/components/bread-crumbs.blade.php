<div>


<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach ($routes as $route)
        <li class="inline-flex items-center">

            @if($loop->index >=1)
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
              </svg>
            @endif

            @if($route['name'])
            <a href="{{ route($route['name']) }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">

              {{ $route['label'] }}
            </a>
            @else

            <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">  {{ $route['label'] }}</span>
            @endif
          </li>
        @endforeach
    </ol>
  </nav>

</div>
