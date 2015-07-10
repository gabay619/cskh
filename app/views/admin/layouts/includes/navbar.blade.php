<header class="navbar navbar-static-top navbar-default " id="top" role="banner">
    <div class="container">
        <div class="navbar-header">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a href="{{URL::route('admin.get-dashboard')}}" class="navbar-brand">Administrator</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                {{--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Member</a></li>--}}
                <li>
                    <a href="{{URL::route('admin.users.index')}}" ><span class="glyphicon glyphicon-user"></span> Member</a>

                </li>

                <li>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-edit"></span> News<b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li><a href="{{URL::route('admin.news.index')}}">Tin Tức</a></li>
                        <li><a href="{{URL::route('admin.newscategories.index')}}">Danh mục</a></li>
                    </ul>
                </li>

                <li><a href="{{URL::route('admin.gameservers.index')}}"><span class="glyphicon glyphicon-hdd"></span> Server</a></li>
                <li><a href="{{URL::route('admin.galleries.index')}}"><span class="glyphicon glyphicon-star-empty"></span> Gallery</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-gift"></span> Giftcode</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-usd"></span> Báo cáo</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

            @if(Auth::check())
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }}</a></li>
                <li><a href="{{URL::route('admin.get-logout')}}"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
            @else
                <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Sign up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Sign in</a></li>
            @endif
            </ul>
        </nav>
    </div>
</header>