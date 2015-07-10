<!doctype html>
<html lang="en">
<head>
        <title>Administrator Controlpanel</title>
        {{ HTML::style('assets/libs/bootstrap/css/bootstrap.css') }}
        {{ HTML::style('assets/libs/font-awesome/css/font-awesome.min.css') }}
	    {{ HTML::style('assets/backend/css/style.css') }}

	    {{ HTML::script('assets/libs/bootstrap/js/jquery.min.js') }}
	    {{ HTML::script('assets/libs/bootstrap/js/bootstrap.min.js') }}



	    @yield('head')


</head>
<body>
      @include('admin.layouts.includes.navbar')


       <div class="container">
          @if(Session::has('success'))

                <div class="alert alert-success alert-dismissible user-message text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span>{{ Session::get('success') }}</span>
                </div>

          @elseif(Session::has('fail'))
                <div class="alert alert-danger alert-dismissible user-message text-center">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <span>{{ Session::get('fail') }}</span>
                </div>
          @endif

            @yield('content')
       </div>
        @yield('javascriptApp')



</body>
</html>
