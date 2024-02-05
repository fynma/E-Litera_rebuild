<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>
    <form action="/api/login" method="post">
        @csrf
        <input type="text" name=email" id="">
        <input type="password" name="password" id="">
        <input type="submit" value="Submit">
    </form>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

    {{-- <script>
        $(document).ready(function() {
            $("#login_Form").submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "127.0.0.1:8000/api/login",
                    type: "POST",
                    data: "formData",
                    success: function(data){
                        if (data.success == false) {
                            $(".result").text(data.msg);
                        } else if(data.success == true){
                            localStorage.setItem("user_token", data." "+data.access_token);
                            windows.open("/profile", "_self");
                        }
                        else {
                            printErrorMsg(data)
                        }
                    }
                });
            });
            function printErrorMsg(msg){
                $(".error").text("");
                $.each(msg, function(key, value){
                    $("."+key+"_err").text(value);
                });
            }
        })
    </script> --}}
</body>

</html>
