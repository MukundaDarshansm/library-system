<!doctype html>
<html>
<head>
    <title>Library</title>
</head>
<body class="p-6">
    <nav class="mb-4">
        <a href="{{ route('dashboard') }}">Dashboard</a> |
        <a href="{{ route('books.index') }}">Books</a> |
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
    @if(session('success')) <div>{{ session('success') }}</div> @endif
    @yield('content')
</body>
</html>
