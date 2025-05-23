@props(['highlight' => false])

<div @class(['highlight' => $highlight, 'card '])>
    {{ $slot }}
    <a {{ $attributes }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">View Details</a>
</div>
