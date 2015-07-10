@extends('frontend.layouts.default')

@section('head')
{{ HTML::script('assets/libs/bootstrap-select/bootstrap-select.min.js') }}
{{ HTML::style('assets/libs/bootstrap-select/bootstrap-select.min.css') }}
@endsection
@section('content')
     <div class="content">
         <div class="breacum tri-down">
             <h2>Câu hỏi thường gặp</h2>

         </div>
         <div class="block_infomation dashboard">
             <div class="panel-group" id="accordion">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <h4 class="panel-title">
                         <a data-toggle="collapse" href="#profile" class="collapsed">
                             1. Tài khoản ID Maxgate dùng để làm gì
                         </a>
                     </h4>
                 </div>
                 <div id="profile" class="panel-collapse collapse" style="height: 0px;">
                     <div class="panel-body">
                         Chế tạo trang bị là một trong những  cách trực tiếp nhất để nâng cao chiến lực của chủ tướng. Tất nhiên,sẽ có tướng quân lo ngại về việc họ sẽ phải cường hóa lại trang bị của mình từ con số 0, nhưng đừng lo, tính năng kế thừa trang bị sẽ giúp các vị tướng quân giữ được những tài nguyên mà các vị đã sử dụng. Hãy xem phần hướng dẫn dưới đây để hiểu rõ về 2 tính năng này

                         Miếng  trang bị muốn rèn  (Vũ khí, mũ, áo …) sẽ yêu cầu những nguyên liệu khác nhau.
                         Nút “Nhận” sẽ dẫn tướng quân đến chỗ có thể tìm kiếm nguyên liệu rèn.
                         Nút “Chế tạo” sử dụng khi tướng quân đạt đủ nguyên liệu rèn ( nên cân nhắc trước khi click vì nguyên liệu
                     </div>
                 </div>
             </div>
             <div class="panel panel-default">
                 <div class="panel-heading">
                     <h4 class="panel-title">
                         <a data-toggle="collapse" href="#account">
                             2. Có thể nạp Max XU từ những hình thức nào
                         </a>
                     </h4>
                 </div>
                 <div id="account" class="panel-collapse collapse ">
                     <div class="panel-body">
                          Chế tạo trang bị là một trong những  cách trực tiếp nhất để nâng cao chiến lực của chủ tướng. Tất nhiên,sẽ có tướng quân lo ngại về việc họ sẽ phải cường hóa lại trang bị của mình từ con số 0, nhưng đừng lo, tính năng kế thừa trang bị sẽ giúp các vị tướng quân giữ được những tài nguyên mà các vị đã sử dụng. Hãy xem phần hướng dẫn dưới đây để hiểu rõ về 2 tính năng này

                          Miếng  trang bị muốn rèn  (Vũ khí, mũ, áo …) sẽ yêu cầu những nguyên liệu khác nhau.
                          Nút “Nhận” sẽ dẫn tướng quân đến chỗ có thể tìm kiếm nguyên liệu rèn.
                          Nút “Chế tạo” sử dụng khi tướng quân đạt đủ nguyên liệu rèn ( nên cân nhắc trước khi click vì nguyên liệu
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


@endsection