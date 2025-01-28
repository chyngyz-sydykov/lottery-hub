@extends('layouts.app', ['noSidebar' => true])

@section('content')
    <div class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
        {{-- Hero Section --}}
        <div class="p-10 text-center bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 text-white">
            <h1 class="text-4xl font-bold mb-4">{{ config('app.name', 'Lottery Platform') }}</h1>
            <p class="text-lg">Experience the thrill of lottery with fair rules and amazing prizes!</p>
        </div>

        {{-- Why Choose Us Section --}}
        <div class="p-16 bg-gray-50 dark:bg-gray-800 text-center">
            <h2 class="text-3xl font-bold mb-6 text-pink-500">Why Choose Us</h2>
            <p class="text-xl mb-4">We provide a secure and transparent platform for players to enjoy lottery games.</p>
            <p class="text-gray-600 dark:text-gray-400">Our site works as a platform between players. It does not earn as a casino but operates on commission between transactions.</p>
        </div>

        {{-- Cards Section --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-10">
            <div class="bg-white dark:bg-gray-700 shadow-md rounded-md p-6 text-center">
                <div class="text-indigo-500 text-5xl mb-4">
                    <i class="fas fa-gamepad"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Play</h3>
                <p class="text-gray-600 dark:text-gray-300">Join exciting lottery groups with ease.</p>
            </div>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded-md p-6 text-center">
                <div class="text-green-500 text-5xl mb-4">
                    <i class="fas fa-coins"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Earn</h3>
                <p class="text-gray-600 dark:text-gray-300">Boost your chances and win exciting prizes.</p>
            </div>
            <div class="bg-white dark:bg-gray-700 shadow-md rounded-md p-6 text-center">
                <div class="text-yellow-500 text-5xl mb-4">
                    <i class="fas fa-wallet"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Get Money</h3>
                <p class="text-gray-600 dark:text-gray-300">Instant payouts directly to your account.</p>
            </div>
        </div>

        {{-- How to Top Up Balance Section --}}
        <div class="grid grid-cols-1 md:grid-cols-2 items-center p-16">
            <div>
                <img src="https://picsum.photos/600/400" alt="Top Up" class="rounded-md shadow-md w-full">
            </div>
            <div class="pl-8">
                <h2 class="text-3xl font-bold mb-4">How to Top Up Balance</h2>
                <p class="text-lg">Topping up your balance is quick and secure. Choose your preferred payment method and start playing!</p>
            </div>
        </div>

        {{-- Statistics Section --}}
        <div class="p-16 bg-gradient-to-r from-gray-200 via-gray-300 to-gray-400 dark:from-gray-800 dark:via-gray-700 dark:to-gray-600 text-center text-gray-900 dark:text-gray-100">
            <h2 class="text-3xl font-bold mb-6">Our Achievements</h2>
            <p class="text-lg">Every 4th player wins, every 10th person wins the lottery, and over 1,000,000 SOMs have been given to players.</p>
        </div>

        {{-- User Reviews Section --}}
        <div class="overflow-x-auto p-10">
            <h2 class="text-3xl font-bold text-center mb-8">What Our Users Say</h2>
            <div class="flex space-x-6">
                @for($i = 1; $i <= 6; $i++)
                    <div class="bg-white dark:bg-gray-700 shadow-md rounded-md p-6 flex-shrink-0 w-64">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-indigo-500 rounded-full text-white flex items-center justify-center">
                                <span class="text-xl font-bold">{{ strtoupper(chr(64 + $i)) }}</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-lg">User {{ $i }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Won {{ rand(1000, 10000) }} SOM</p>
                            </div>
                        </div>
                        <p class="text-gray-600 dark:text-gray-300">"This platform is amazing! I can't believe I won so much money!"</p>
                        <div class="mt-4">
                            ⭐⭐⭐⭐⭐
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- FAQ Section --}}
        <div class="p-16 bg-gray-50 dark:bg-gray-800">
            <h2 class="text-3xl font-bold text-center mb-8">FAQs</h2>
            <div class="space-y-4">
                <div class="border-b border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-bold cursor-pointer">What is the minimum amount to join?</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">The minimum amount is 100 SOM.</p>
                </div>
                <div class="border-b border-gray-200 dark:border-gray-600">
                    <h3 class="text-lg font-bold cursor-pointer">How does the platform earn?</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">We earn by charging a small commission on transactions.</p>
                </div>
                <!-- Add more FAQs -->
            </div>
        </div>
    </div>
@endsection
