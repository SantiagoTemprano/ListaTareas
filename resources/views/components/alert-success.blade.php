@if (session('success'))
    <p class="mb-4 px-4 py-2 bg-green-700 border border-green-900 text-green-100 rounded-md">
       {{ $slot }}
    </p>
@endif