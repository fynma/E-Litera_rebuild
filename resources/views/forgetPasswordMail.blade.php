<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title'] }}</title>
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
</head>

<body>
    <p>{{ $data['body'] }}</p>
    <a href="{{ $data['url'] }}">Reset Password Here !</a>
</body>

</html>
