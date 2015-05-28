@extends('frontend.layouts.default')

@section('content')
    <div class="content">
        <div class="breacum tri-down">
            <h2>Gửi yêu cầu mới</h2>

        </div>
        <div class="block_infomation">
            <div class="col-sm-6" style="padding-left: 0px !important;">
                <div class="form-group" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal">Trò chơi/Hệ thống</label>

                    <select id="game_id" name="game_id"  class="form-control selectpicker show-tick ">
                        <option value="0">Vui lòng chon trò chơi/hệ thống</option>
                        <option value="1">Phong thần</option>
                    </select>
                    <script>
                           $("#game_id").val(0);

                                        </script>
                </div>


            </div>
            <div class="col-sm-6" style="padding-right: 0px !important;">
                <div class="form-group" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Vấn đề</label>
                    <select id="game_id" name="game_id"  class="form-control selectpicker show-tick" placeholder="Vui lòng chon trò chơi/hệ thống"  title="Không chọn">
                        <option value="0">Vui lòng chon trò chơi/hệ thống</option>
                        <option value="1">Phong thần</option>
                    </select>
                    <script>$("#game_id").val(0);</script>
                </div>
            </div>

            <div class="col-sm-6" style="padding-left: 0px !important;">
                <div class="form-group" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal">Chọn máy chủ</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Vui lòng chọn máy chủ">
                </div>
            </div>
            <div class="col-sm-6" style="padding-right: 0px !important;">
                <div class="form-group" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Tên nhân vật</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Vui lòng nhập tên nhân vật">
                </div>
            </div>
            <div class="col-sm-12 nopadding" >
                <div class="form-group">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Nội dung</label>
                    <img src="/assets/images/ckeditor.png" alt=""/>
                </div>
            </div>

            <div class="row nopadding">
                <div class="col-sm-3" style="padding-left: 0px !important;padding-right: 0 !important;">
                    <button class="btn btn-uploadpic" style="width: 147px !important"  type="button">Upload ảnh</button>
                </div>
                <div class="col-sm-3 nopadding" style="width: 15% !important;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal;margin-top: 5px" >Nhập captcha</label>
                </div>
                <div class="col-sm-3 nopadding">
                    <img src="/assets/images/captcha.png" alt=""/>
                </div>
                <div class="col-sm-3 nopadding" >
                    <input type="text" class="form-control" style="border-radius: 0 !important;" placeholder="Vui nhập captcha">
                </div>
            </div>


            <div class="col-sm-12" style="padding:15px 0 0px 0; margin:10px 0px 20px 0;border-top:1px solid #dedede;border-bottom:1px solid #dedede" >
                <div class="form-group">
                    <button class="btn btn_guiyeucau" type="button">Gửi yêu cầu</button>
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