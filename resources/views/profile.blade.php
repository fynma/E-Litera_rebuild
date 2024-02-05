<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>profile</title>
</head>
<body>
    Hi tod !
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"http://127.0.0.1:8000/api/profile",
                type: "GET",
                headers:{'Authorization':'Bearer '+ localStorage.getItem('token')},
            });
        });
    </script>
</body>
</html>