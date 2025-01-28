@if (session('success') || session('error'))
    <div class="container mx-auto fixed top-0 left-0 right-0 w-1/3">
        @if (session('success'))
            <div class="p-2 mb-4 text-green-800 border border-green-300 rounded-sm bg-green-50 dark:bg-green-900 dark:border-green-800 dark:text-green-200">
                <div class="flex justify-between items-center">
                    <p class="text-sm">{{ session('success') }}</p>
                    <button class="text-green-800 dark:text-green-200 font-bold">&times;</button>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-red-900 dark:border-red-800 dark:text-red-200">
                <div class="flex justify-between items-center">
                    <p class="text-sm">{{ session('error') }}</p>
                    <button class="text-red-800 dark:text-red-200 font-bold">&times;</button>
                </div>
            </div>
        @endif
    </div>
@endif
