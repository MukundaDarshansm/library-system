<!doctype html>
<html>
<head>
    <title>Login</title>
</head>
<body class="p-6">
    <h1>Login</h1>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <div>{{ $message }}</div> @enderror

        <label>Password</label>
        <input type="password" name="password" required>

        <label><input type="checkbox" name="remember"> Remember me</label>

        <button type="submit">Login</button>
    </form>
</body>
</html>
