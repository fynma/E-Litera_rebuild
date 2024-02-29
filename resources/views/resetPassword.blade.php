<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
    <script>
        var appUrl = "{{ config('APP_URL') }}";
    </script>
</head>

<body>
    <form method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user[0]['user_id'] }}">
        <input type="text" name="password" id="">
        <input type="text" name="password_confirmation" id="">

        <button type="submit">Submit</button>
    </form>
</body>

</html>
