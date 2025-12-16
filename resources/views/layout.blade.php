<!DOCTYPE html>
<html>
<head>
    <title>Tiket Online</title>
</head>
<body>
    <a href="/">Home</a> | 
    <a href="/admin/orders">Admin</a>
    <hr>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @yield('content')
</body>
</html>
