 @if(Auth::check())
 <div class="block_login">
     <div class="head_login">
         <div class="wellcome_logged">Xin chào,<a class="" href=""> {{ Auth::user()->username }}</a></div>
         <div class="btn_logout"><a href="{{Oauth2Helper::BASE_URL}}/users/logout?return_url={{URL::to('/')}}">Thoát</a></div>
     </div>
     <!--------form-login--------------->
     <div class="content_login">
         <p class="yc_new"><a href="/question/create">Yêu cầu hỗ trợ mới</a><a class="new_yc" href=""><img
                 src="/assets/images/icon_new.png" alt=""/></a></p>
         <p class="yc_replied"><a href="/question/replied">Yêu cầu đã được trả lời({{$countQuestion}})</a></p>
         <p class="yc_finish"><a href="/question/resolved">Yêu cầu đã kết thúc</a></p>
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
         $(function(){
             $("#txtPassword").keypress(function(e){
                if(e.which==13){
                    login();
                }
            });
         });
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