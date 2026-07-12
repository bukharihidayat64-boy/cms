<!DOCTYPE html>
<html>
<head>
    <title>Logout | RinjaniTrail.id</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; font-family: Arial;">
    <div style="text-align: center;">
        <h2>Anda yakin ingin logout?</h2>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="padding: 10px 20px; background: #dc2626; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Ya, Logout
            </button>
            <a href="{{ url('/') }}" style="margin-left: 10px; padding: 10px 20px; background: #6b7280; color: white; text-decoration: none; border-radius: 5px;">
                Batal
            </a>
        </form>
    </div>
</body>
</html>