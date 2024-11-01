<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Beasiswa</title>
</head>
<body>
    <h2>Pendaftaran Beasiswa - Pandawara Go To Campus</h2>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('submit-pendaftaran') }}" method="POST">
        @csrf
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="reason">Alasan Mengajukan:</label><br>
        <textarea id="reason" name="reason" required></textarea><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
