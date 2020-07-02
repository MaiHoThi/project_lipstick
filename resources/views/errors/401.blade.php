<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      a:link, a:visited {
  background-color: honeydew;
  color: black;
  padding: 14px 25px;
  border-radius: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: hotpink;
}
    </style>
    <title>errors</title>
</head>
<body style="background-image: url('/image/401.jpg')">
    <div class="container-fluid" >
        <h1>HELLO</h1>
        <h3>Bạn cần phải đăng nhập để xem hóa đơn</h3>
        <p style="color: red">{{Request::get('messageorders')}}</p>  

        <a href="/auth/login" ><strong>Đăng nhập</strong></a>
    </div>
</body>
</html>