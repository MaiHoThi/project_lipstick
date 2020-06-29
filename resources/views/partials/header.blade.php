<!-- Latest compiled and minified CSS & JS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/home.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="menu">
    <header>
        <ul>
            <li><img src="/image/lipstick.jpg" alt="logo" name="logo" class="logo"></li>
            <li>
                <form class="form-inline" action="/products/search" role="search">
                    <!-- <i class="fas fa-search" aria-hidden="true"></i> -->
                    <input class="form-control " type="text" placeholder="Tìm kiếm" aria-label="Search" name="search"><button class="btn btn-outline-success  my-sm-0" type="submit">Search</button>
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
                    <a href="/cart" >
                        <strong>Giỏ hàng <span style="color: red">
                            
                    
                        </span></strong><i class="fa fa-shopping-bag" aria-hidden="true" ></i>
                        <div class="alert alert-warning">

                            <li  class="close" data-dismiss="alert" aria-hidden="true">&times;</li> {{Request::get('message')}}
                        </div>

                    </a>
                </h5>
            </li>
        </ul>
</div>


</header>