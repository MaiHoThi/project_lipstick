<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Latest compiled and minified CSS & JS -->
      <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
      <script src="//code.jquery.com/jquery.js"></script>
      <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="/css/home.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>detail</title>
</head>
<body>
    <div class="container-fluid">
        @include('partials/header') 
        @include('partials/menu') 

        <div id="detail" class="container">
<div class="col-md-6 col-sm-6 col-xs-6">
    <img src="{{'/storage/'.$detail->image}}" alt="anh">

</div>
<div class="col-md-6 col-sm-6 col-xs-6">
<h1>{{$detail->name}}</h1>
<p>===</p>
<p>Giá:{{$detail->getPrice()}}</p>
<p style="color: red">Giảm giá:{{$detail->sale}}%</p>
<p>{{$detail->description}}</p>
<p>Tình trạng:{{$detail->status}}</p>
<form action="" method="get">
    <button type="submit" class=" form-control btn btn-success">Thêm giỏ hàng</button>
</form>
</div>

        </div>
    </div>
   @include('partials/footer') 

</body>
</html>