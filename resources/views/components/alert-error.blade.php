@if (session('error'))
    <p class="mb-4 px-4 py-2 bg-red-700 border border-red-900 text-red-100 rounded-md">
       {{ $slot }}
    </p>
@endif