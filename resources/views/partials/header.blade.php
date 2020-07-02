<!-- Latest compiled and minified CSS & JS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/home.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    <style> 
        input[type=text] {
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 100%;
}
</style>
<div id="menu">
    <header>
        <ul>
            <li><img src="/image/lipstick.jpg" alt="logo" name="logo" class="logo"></li>
            <li>
                <form class="form-inline" action="/products/search" role="search">
                    <input type="text" name="search" placeholder="Tìm kiếm.." >
                 
                </form>
            </li>
            <li style="display: flex">
                @if(Auth::user()) Xin chào:{{Auth::user()->username}}
                <div>@if(auth::user()) echo {{auth::user()->id}} @endif
                </div>
                <form action="/logout" method="get">
                    <button>Đăng xuất</button>
                </form>
                @else
                <form action="/auth/login" method="get">
                    <button type="submit">Đăng nhập</button>
                </form>/
                <form action="/register" method="get">
                    <button type="submit">Đăng ký</button>

                </form>
                @endif
            </li>
            <li>

                <h5>
                    <a href="/cart"  class="btn btn-info btn-lg" >
                        <strong>Giỏ hàng <span style="color: red">            
                        </span></strong><i class="fa fa-shopping-bag" aria-hidden="true" ></i>
                    </a>
                </h5>
            </li>
        </ul>
</div>


</header>