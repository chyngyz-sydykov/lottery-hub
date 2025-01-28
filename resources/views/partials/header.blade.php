<header>
    <nav class="flex justify-end bg-gradient-to-r from-lime-500 to-blue-500 p-4">
        <ul class="flex space-x-4">
            <li><a href="{{ url('/') }}" class="px-4 py-2 border rounded text-white">Home</a></li>
            <li><a href="{{ route('groups.index') }}" class="px-4 py-2 border rounded text-white">Groups</a></li>
            <li><a href="{{ url('/login') }}" class="px-4 py-2 border rounded text-white">Sign In</a></li>
            <li><a href="{{ url('/register') }}" class="px-4 py-2 border rounded text-white">Register</a></li>
        </ul>
    </nav>
</header>
