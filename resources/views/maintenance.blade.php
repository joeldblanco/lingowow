<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Maintenance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .logo {
            margin-bottom: 50px;
        }

        .logo>img {
            width: 200px;
            border-radius: 100%;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="{{ Storage::url('images/logo.png') }}" alt="Logo">
    </div>
    <h1>Under Maintenance</h1>
    <p>We are currently performing maintenance on our website.</p>
    <p>Please check back later.</p>
    <p style="margin-top: 10%">
        Chat with us via <a href="https://wa.me/51902518947" class="text-blue-500 hover:underline"
            target="_blank">Whatsapp</a>
    </p>
</body>

</html>
