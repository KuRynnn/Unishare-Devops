<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Beasiswa</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container styling */
        .form-container {
            background-color: #fff;
            padding: 20px 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
        }

        /* Form title styling */
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            color: #555;
            font-weight: bold;
            display: block;
            margin: 15px 0 5px;
        }

        /* Input styling */
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
        }

        /* Textarea styling */
        textarea {
            resize: vertical;
            height: 100px;
        }

        /* Submit button styling */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: orange;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        /* Button hover effect */
        button[type="submit"]:hover {
            background-color: orangered;
        }

        /* Success message styling */
        .success-message {
            color: #4CAF50;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- Menampilkan judul beasiswa -->
        <h2>Pendaftaran Beasiswa - {{ $post->title }}</h2>

        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <form action="{{ route('submit-pendaftaran') }}" method="POST">
            @csrf
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" placeholder="Masukkan nomor telepon" required>

            <label for="reason">Alasan Mengajukan:</label>
            <textarea id="reason" name="reason" placeholder="Jelaskan alasan mengajukan beasiswa ini" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
