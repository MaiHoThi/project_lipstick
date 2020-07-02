<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <style>
       #cate{
    z-index: 1000;
    position: fixed;
   
       }
#cate li {
  color: #f1f1f1;
  display: inline-block;

  /* line-height: 40px; */
  margin-left: -5px;
}
#cate a {
  text-decoration: none;
  color: #fff;
  display: grid;
}
#cate a:hover {
  background: #F1F1F1;
  color: #333;
}
   </style>
</head>
<body>
    <div id="cate">
        <ul>
            <li>@foreach ($categories as $item)
                <a  href="/categories/{{$item->id}}">{{$item->name}}</a>
                @endforeach
              </li>
        </ul>
    </div>
</body>
</html>