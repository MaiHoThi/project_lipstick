<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <title>insertproduct</title>
</head>
<body>
  <div class="container-fluid"  style=" position: relative">
    @include('partials/header')
    
    <div class="container">
    <div id="viewport" >
  @include('partials/category')
  <!-- Content -->
  <div id="content">
    <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>STT</th>
              <th>Email</th>
              <th>Họ và tên</th>
              <th>Ngày sinh</th>
              <th>Giới tính</th>
              <th>Vài trò</th>
              <th>Xóa </th>
            </tr>
          </thead>
          <tbody>
          
            @csrf
            @foreach ($users as $item)
         
            <tr>
            <td>{{$item->id}}</td>

              <td>{{$item->email}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->birthday}}</td>
              <td>{{$item->gender}}</td>
              <td>{{$item->role}}</td>
              <td><form action='{{ "/users/".$item ->id}}' method="POST" class="group-inline">
                @csrf
                @method("DELETE")
                <button type="submit" >Xóa</button></form></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> 
  </div>
  
</div>
    </div>
    </div>
    
</body>
</html>