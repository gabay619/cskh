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
                    @login_block()
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
