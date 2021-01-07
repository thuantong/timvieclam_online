<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
<p>Chào bạn,</p>
<p>Đây là mã code dùng để thay đổi thay đổi mật khẩu:</p>
<p style="border: 1px black solid;padding: 5px">{{$dataobj['code']}}</p>
</body>
</html>
