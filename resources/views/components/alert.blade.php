@if(session()->has('success_message'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ session('success_message') }}
  </div>
@endif
<div id="successMessageContainer"></div>
