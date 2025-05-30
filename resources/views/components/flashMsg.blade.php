@props(['type', 'message'])

<div id="flash"
    class="flex items-center p-4 mb-4  border-t-4 @if ($type == 'success') text-green-800 border-green-300 bg-green-50 dark:text-green-400 dark:border-green-800 @else text-red-800 border-red-300 bg-red-50 dark:text-red-400 dark:border-red-800 @endif dark:bg-gray-800 "
    role="alert">
    @if ($type == 'success')
        <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm13.707-1.293a1 1 0 0 0-1.414-1.414L11 12.586l-1.793-1.793a1 1 0 0 0-1.414 1.414l2.5 2.5a1 1 0 0 0 1.414 0l4-4Z"
                clip-rule="evenodd" />
        </svg>
    @else
        <svg class="w-5 h-5 text-red-600 me-2" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm3.53 12.47a.75.75 0 1 1-1.06 1.06L12 13.06l-2.47 2.47a.75.75 0 0 1-1.06-1.06L10.94 12 8.47 9.53a.75.75 0 0 1 1.06-1.06L12 10.94l2.47-2.47a.75.75 0 0 1 1.06 1.06L13.06 12l2.47 2.47z" />
        </svg>
    @endif
    <div class="ms-3 text-sm font-medium">
        {{ $message }}
    </div>
</div>
