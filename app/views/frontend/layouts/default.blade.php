<!doctype html>
<html lang="en">
<head>
    <title>Trung tâm chăm sóc khách hàng</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->

    <link rel="stylesheet" href="/assets/libs/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="/assets/css/style.css"/>
    <link rel="stylesheet" href="/assets/libs/font-awesome/css/font-awesome.min.css"/>
    <script  type="text/javascript" src="/assets/libs/bootstrap/js/jquery.min.js"></script>
    <script  type="text/javascript" src="/assets/libs/bootstrap/js/bootstrap.min.js"></script>
    {{ HTML::script('assets/libs/bootstrap-select/bootstrap-select.min.js') }}
    {{ HTML::style('assets/libs/bootstrap-select/bootstrap-select.min.css') }}

    @yield('head')

</head>
<body>

<header>
    <div class="container">

        <div class="logo"><h1><a href="#"><img src="/assets/images/logo.png" width="259px" alt="logo"/></a></h1></div>
        <div class="banner"><a href="#"><img src="/assets/images/banner.png" width="728px" alt="logo"/></a></div>
    </div>
</header>
<main>

    <div class="container">
            <!-----------side bar---------->
            <div class="sidebar">
                <div class="wrap_sidebar">

                    @if(Auth::check())
                        <div class="block_login">
                            <div class="head_login">
                                <div class="wellcome_logged">Xin chào,<a class="" href=""> {{ Auth::user()->username }}</a></div>
                                <div class="btn_logout"><a class="" href="/logout">Thoát</a></div>
                            </div>
                            <!--------form-login--------------->
                            <div class="content_login">
                                <p class="yc_new"><a href="/question/create">Yêu cầu hỗ trợ mới</a><a class="new_yc" href=""><img
                                        src="/assets/images/icon_new.png" alt=""/></a></p>
                                <p class="yc_replied"><a href="/question">Yêu cầu đã được trả lời(3)</a></p>
                                <p class="yc_finish"><a href="/question">Yêu cầu đã kết thúc</a></p>
                            </div>
                        </div>

                    @else
                        <div class="block_login">
                            <div class="head_login">
                                <div class="wellcome"><a class="" href="">Tài khoản maxgate</a></div>
                                <div class="btn_action"><a class="" href="">Đăng ký</a></div>
                            </div>
                            <!--------form-login--------------->
                            <div class="content_login">
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username:" required="required"
                                               autofocus="autofocus" name="username" id="txtUsername" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Mật khẩu:" id="txtPassword" required="required"
                                               name="password" type="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label class="control-label">
                                                <input type="checkbox" name="">
                                                <span style="color:#5e5652">Ghi nhớ mật khẩu</span>
                                            </label>
                                            <a href="#" class="pull-right" style="color:#5e5652;text-decoration:underline">Quên
                                                mật khẩu</a>
                                        </div>
                                    </div>
                                    <div class="btnwrapper">
                                        <button type="button" class="btn btn-primary btn-block btnlogin " onclick="login();"> Đăng nhập
                                        </button>
                                        <p>Hoặc</p>
                                        <a href="#" class="social_fb"></a>
                                        <a href="#" class="social_gg"></a>
                                    </div>
                                </form>
                                <script>
                                function login(){
                                        username = $('#txtUsername').val();
                                        password = $('#txtPassword').val();
                                        retUrl = window.location.href;

                                        $.post('/users/login',{
                                                password:password, username:username,url:retUrl
                                            }
                                            ,function(result){
                                            console.log(result);
                                                if(result.success){
                                                    window.location.href = result.url;
                                                }else{
                                                    alert("Thông tin đăng nhập không hợp lệ");
                                                    $('#username').focus();
                                                }
                                            },'json');
                                    }
                                </script>
                            </div>
                        </div>
                    @endif

                    <div class="clear"></div>
                    <div class="hotline"><img src="/assets/images/hotline.png" alt=""/></div>
                    <div class="worktime">
                        <p>Thời gian làm việc</p>

                        <div class="time_row">
                            <span class="day">Từ thứ 2 đến thứ 6:</span>
                            <span class="oclock">8h:30’ - 17h30'</span>
                        </div>
                        <div class="time_row">
                            <span class="day">Thứ 7</span>
                            <span class="oclock">8h:30’ - 17h30'</span>
                        </div>
                        <div class="time_row">
                            <span class="day">Nghỉ chủ nhật và ngày lễ</span>

                        </div>


                    </div>

                </div>
            </div>
            <!-----------end side bar-------->
            @yield('content')

    </div>

</main>
<!------------------------footer---------------------->
<footer>

        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo-phucthanh"></div>
                </div>
                <div class="col-md-6 contact">
                    <p>CÔNG TY CỔ PHẦN DỊCH VỤ TRỰC TUYẾN PHÚC THÀNH</p>
                    <p>Địa chỉ : Số 3, phố Đội Cung, Phường Lê Đại Hành, Quận Hai Bà Trưng, TP Hà Nội</p>
                    <p>Tel: 04 6687 2648‬ (Việt Nam)</p>
                    <p>Email: <a href="#">hotro@maxgate.vn</a> - <a href="">Google+</a></p>
                </div>
                <ul class="col-md-3 list-unstyled list-inline">
                    <li><a href="#">Hỏi đáp</a></li>
                    <li><a href="#">Hướng dẫn</a></li>
                    <li><a href="#">Hỗ trợ</a></li>
                </ul>

            </div>

        </div>


</footer>
<!------------------------end footer---------------------->
<script>
    $('#myCollapsible').collapse({
        toggle: false
    })
</script>
<script>
    $(function(){
        $(".panel-collapse").on('show.bs.collapse',function(){
            $(this).parent().find(".panel-title").addClass('active');
        });
        $(".panel-collapse").on('hide.bs.collapse',function(){
            $(this).parent().find(".panel-title").removeClass('active');
        });
    });
</script>




</body>
</html>
