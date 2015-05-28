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
                                <p class="yc_new"><a href="/thread/new">Yêu cầu hỗ trợ mới</a><a class="new_yc" href=""><img
                                        src="/assets/images/icon_new.png" alt=""/></a></p>
                                <p class="yc_replied"><a href="/thread/list">Yêu cầu đã được trả lời(3)</a></p>
                                <p class="yc_finish"><a href="/thread/list">Yêu cầu đã kết thúc</a></p>
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
            <div class="content">
                <div class="breacum tri-down">
                    <h2>Câu hỏi thường gặp</h2>

                </div>
                <div class="block_infomation">
                    <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#profile" class="collapsed">
                                    Thông tin cá nhân
                                </a>
                            </h4>
                        </div>
                        <div id="profile" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <form method="POST" action="https://id.maxgate.vn/users/profile" accept-charset="UTF-8" class="form" id="profile-form"><input name="_token" type="hidden" value="xnqm1iZ3CbOm660KmQjArpmvmRQsb0F7WBpF9Kkr">
                                    <section id="msg-profile" style="font-weight: bold"></section>
                                    <div class="form-input">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Họ tên:</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" placeholder="Tên" id="txtFirstName" name="first_name" type="text" value="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input class="form-control" placeholder="Họ và tên đệm" id="txtLastName" name="last_name" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Giới tính:</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control text-center" id="cboGender" name="gender"><option value="" selected="selected">--Giới tính--</option><option value="m">Nam</option><option value="f">Nữ</option></select>
                                                </div>
                                                <label class="col-sm-3 control-label">Số CMND:</label>
                                                <div class="col-sm-3">
                                                    <input class="form-control" placeholder="Số CMND" id="txtIdNumber" name="identity_number" type="text">
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Sinh nhật:</label>
                                                <div class="day col-sm-3">
                                                    <select class="form-control text-center" id="cboDay" name="day"><option value="" selected="selected">--Ngày--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
                                                </div>
                                                <div class="mon col-sm-3">
                                                    <select class="form-control text-center" id="cboMonth" name="mon"><option value="" selected="selected">--Tháng--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
                                                </div>
                                                <div class="year col-sm-3">
                                                    <select class="form-control text-center" id="cboYear" name="year"><option value="" selected="selected">--Năm--</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option></select>
                                                </div>
                                            </div>
                                            <div class="clear"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Địa chỉ:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" placeholder="Địa chỉ" id="txtAddress" name="address" type="text">
                                                </div>
                                            </div>
                                            <div class="clear"></div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Tỉnh/Thành phố:</label>
                                                <div class="col-sm-3">
                                                    <select class="province form-control" id="cboProvince" name="province_id"><option value="" selected="selected">--Tỉnh/Thành--</option><option value="89">An Giang</option><option value="77">Bà Rịa - Vũng Tàu</option><option value="24">Bắc Giang</option><option value="6">Bắc Kạn</option><option value="95">Bạc Liêu</option><option value="27">Bắc Ninh</option><option value="83">Bến Tre</option><option value="74">Bình Dương</option><option value="70">Bình Phước</option><option value="60">Bình Thuận</option><option value="52">Bình Định</option><option value="96">Cà Mau</option><option value="92">Cần Thơ</option><option value="4">Cao Bằng</option><option value="64">Gia Lai</option><option value="2">Hà Giang</option><option value="35">Hà Nam</option><option value="1">Hà Nội</option><option value="42">Hà Tĩnh</option><option value="30">Hải Dương</option><option value="31">Hải Phòng</option><option value="93">Hậu Giang</option><option value="79">Hồ Chí Minh</option><option value="17">Hòa Bình</option><option value="33">Hưng Yên</option><option value="56">Khánh Hòa</option><option value="91">Kiên Giang</option><option value="62">Kon Tum</option><option value="12">Lai Châu</option><option value="68">Lâm Đồng</option><option value="20">Lạng Sơn</option><option value="10">Lào Cai</option><option value="80">Long An</option><option value="36">Nam Định</option><option value="40">Nghệ An</option><option value="37">Ninh Bình</option><option value="58">Ninh Thuận</option><option value="25">Phú Thọ</option><option value="54">Phú Yên</option><option value="44">Quảng Bình</option><option value="49">Quảng Nam</option><option value="51">Quảng Ngãi</option><option value="22">Quảng Ninh</option><option value="45">Quảng Trị</option><option value="94">Sóc Trăng</option><option value="14">Sơn La</option><option value="72">Tây Ninh</option><option value="34">Thái Bình</option><option value="19">Thái Nguyên</option><option value="38">Thanh Hóa</option><option value="46">Thừa Thiên Huế</option><option value="82">Tiền Giang</option><option value="84">Trà Vinh</option><option value="8">Tuyên Quang</option><option value="86">Vĩnh Long</option><option value="26">Vĩnh Phúc</option><option value="15">Yên Bái</option><option value="48">Đà Nẵng</option><option value="66">Đắk Lắk</option><option value="67">Đắk Nông</option><option value="11">Điện Biên</option><option value="75">Đồng Nai</option><option value="87">Đồng Tháp</option></select>
                                                </div>
                                                <label class="control-label text-right col-sm-3">Quận/Huyện:</label>
                                                <div id="load_districts" class="col-sm-3">
                                                    <select class="district form-control" id="cboDistrict" name="district_id"><option value="" selected="selected">--Quận/Huyện--</option></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-button">
                                        <div class="col-sm-2 col-sm-offset-3">
                                            <button class="btn btn-primary" onclick="updateProfile()" id="btn-update-profile" type="button">Cập nhật</button>
                                            <section class="text-right">
                                                <img src="//assets/images/ajax_loading.gif" alt="" style="display: none" height="25" width="25" id="loading-profile">
                                            </section>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="btn btn-default" type="reset" value="Nhập lại">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#account">
                                    Thông tin tài khoản
                                </a>
                            </h4>
                        </div>
                        <div id="account" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <form method="POST" action="https://id.maxgate.vn/users/profile" accept-charset="UTF-8" class="form" id="account-form"><input name="_token" type="hidden" value="xnqm1iZ3CbOm660KmQjArpmvmRQsb0F7WBpF9Kkr">
                                    <section id="msg-account" style="font-weight: bold"></section>
                                    <div class="form-input">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email hiện tại:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" disabled="disabled" id="txtOldEmail" name="old_email" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email mới:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtEmail" name="email" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nhập lại email mới:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtEmailConfirmation" name="email_confirmation" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Số điện thoại:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" disabled="disabled" name="current_phone" type="text" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Số điện thoại mới:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtPhone" name="new_phone" type="text">
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-button">
                                        <div class="col-sm-2 col-sm-offset-3">
                                            <button class="btn btn-primary" onclick="updateAccount()" id="btn-update-account" type="button">Cập nhật</button>
                                            <section class="text-right">
                                                <img src="//assets/images/ajax_loading.gif" alt="" style="display: none" height="25" width="25" id="loading-account">
                                            </section>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="btn btn-default" type="reset" value="Nhập lại">
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#security">
                                    Bảo mật
                                </a>
                            </h4>
                        </div>
                        <div id="security" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <form method="POST" action="https://id.maxgate.vn/users/profile" accept-charset="UTF-8" class="form"><input name="_token" type="hidden" value="xnqm1iZ3CbOm660KmQjArpmvmRQsb0F7WBpF9Kkr">
                                    <section id="msg-pass" style="font-weight: bold"></section>
                                    <div class="form-input" style="border: none">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label" style="margin: 0">Mật khẩu:</label>
                                                <div class="col-sm-2">
                                                    *************
                                                </div>
                                                <a href="javascript:;" id="showFormPass"><i class="glyphicon glyphicon-pencil"></i> Sửa</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" action="https://id.maxgate.vn/users/profile" accept-charset="UTF-8" class="form" id="security-form" style="display: none;"><input name="_token" type="hidden" value="xnqm1iZ3CbOm660KmQjArpmvmRQsb0F7WBpF9Kkr">
                                    <div class="form-input">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Mật khẩu cũ:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required="required" id="txtOldPass" name="old_password" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Mật khẩu mới:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required="required" id="txtPass" name="password" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nhập lại MK mới:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required="required" id="txtPassConfirmation" name="password_confirmation" type="password" value="">
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="form-group form-button">
                                        <div class="col-sm-2 col-sm-offset-3">
                                            <button class="btn btn-primary" onclick="updatePass()" id="btn-update-pass" type="button">Cập nhật</button>
                                            <section class="text-right">
                                                <img src="//assets/images/ajax_loading.gif" alt="" style="display: none" height="25" width="25" id="loading-pass">
                                            </section>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="btn btn-default" type="reset" value="Nhập lại">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="gamebanner">
                        <div class="row">
                            <div class="col-sm-6"><a href="#" target="_blank"><img src="/assets/images/bn1.jpg" alt=""/></a></div>
                            <div class="col-sm-6" style="padding-left:2px"><a href="" target="_blank"><img src="/assets/images/bn2.jpg" alt=""/></a></div>
                        </div>
                    </div>
                </div>


            </div>
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
