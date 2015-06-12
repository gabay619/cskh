@extends('frontend.layouts.default')

@section('head')
   {{ HTML::script('assets/libs/ckeditor/ckeditor.js') }}
    {{ HTML::script('assets/libs/ckfinder/ckfinder.js') }}

@endsection
@section('content')
    <div class="content">
        <div class="breacum tri-down">
            <h2>Hỗ trợ khách hàng</h2>

        </div>
        <div class="block_infomation">

                    <div class="row nopadding">
                        <div class="col-sm-6 nopadding" style="margin-bottom: 15px !important;">
                            <label class="control-label lbl_info_yc" >Trò chơi:</label>
                            <p  class="lbl_info_txt">{{{$question->game->name}}}</p>
                        </div>
                        <div class="col-sm-6 nopadding">
                            <label class=" control-label lbl_info_yc">Vấn đề:</label>
                            <p  class="lbl_info_txt">{{{$question->title}}}</p>
                        </div>

                    </div>
                    <div class="row nopadding">
                        <div class="col-sm-6 nopadding">
                            <label class="control-label lbl_info_yc" >Máy chủ:</label>
                            <p  class="lbl_info_txt">S{{{$question->server_id}}}-{{{$question->gameserver->name}}}</p>
                        </div>
                        <div class="col-sm-6 nopadding">
                            <label class=" control-label lbl_info_yc ">Nhân vật:</label>
                            <p  class="lbl_info_txt">{{{$question->character_name}}}</p>
                        </div>

                    </div>

                    <div class="row" style="margin-top:10px">


                        @for($i = 0; $i < 3; $i++)
                        <div class="col-sm-4">


                            @if($allImage->count()>$i)
                            <a href="{{{$allImage[$i]['path']==""?"#":"uploads".$allImage[$i]['path']}}}">
                                <img src="{{{$allImage[$i]['path']==""?"/assets/images/noimage.jpg":"/uploads/".$allImage[0]['path']}}}" width="215px" height="138px" class="thumbnail ">
                            </a>
                            @else
                                <a href="#">
                                    <img src="/assets/images/noimage.jpg" width="215px" height="138px" class="thumbnail ">
                                </a>
                            @endif

                        </div>

                        @endfor
                    </div>

                    <div class="reply_block">
                        <div class="breadcum tri-down">
                            <h2 class="">{{{$question->user->username}}}</h2>

                        </div>
                        <div class="message">
                            {{$question->content}}
                        </div>
                    </div>

                    <div class="reply_block reply_admin">
                        <div class="breadcum tri-down">
                            <h2 class="">Admin, Tân:</h2>
                            <img src="/assets/images/reply_arrow.png" alt=""/>

                        </div>
                        <div class="message">
                            Không còn đâu bạn ơi
                            cảm ơn bạn đã sử dụng dịch vụ. tặng bạn 1000k KNB
                        </div>
                    </div>

                    <p class="question_done">Câu trả lời của Admin đã giải quyết được thắc mắc của bạn?</p>

                    <div class="row " style="" >
                        <div class="col-sm-3">
                            <div class="form-group ">
                                <button class="btn btn_done" type="button">Đã giải quyết xong</button>
                            </div>
                        </div>

                        <div class="form-group col-sm-3">
                            <button class="btn btn_continous" data-toggle="collapse" data-target="#block_form_continous" aria-expanded="false" aria-controls="block_form_continous">Tôi muốn hỏi tiếp</button>
                        </div>
                    </div>


                    <div class="collapse" id="block_form_continous">
                        <div class="col-sm-12 nopadding" >
                            <div class="form-group">
                                <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Nội dung</label>
                                {{ Form::textarea('content', Input::old('content'), array('class'=>'form-control ','id'=>'contentContainer'))}}
                    <script>CKEDITOR.replace('contentContainer');</script>
                            </div>
                        </div>
                        <div class="row nopadding">
                            
                            <div class="col-sm-3 nopadding" style="width: 15% !important;">
                                <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal;margin-top: 5px" >Nhập captcha</label>
                            </div>
                            <div class="col-sm-3 nopadding">
                                @captcha('chargeCaptcha')
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
                    </div>




                    <div class="gamebanner">
                        <div class="row">
                            <div class="col-sm-6"><a href="#" target="_blank"><img src="/assets/images/bn1.jpg" alt=""/></a></div>
                            <div class="col-sm-6" style="padding-left:2px"><a href="" target="_blank"><img src="/assets/images/bn2.jpg" alt=""/></a></div>
                        </div>
                    </div>
        </div>
    </div>


    <script>

        function setWallpager(input){
                alert(input.files[0].mozFullPath);
                var reader = new FileReader();
                 reader.onload = function (e) {
                            alert(e.target.result);
//                            $('#blah').attr('src', e.target.result);
                        }

                return;
                $.blockUI({ message: 'Vui lòng chờ' });

                allFiles=this.files
                tmpArr = [];
                for (obj in allFiles) {
                    tmpArr.push(allFiles[obj].url);
                }

                type=2;

                $.post('',{type:type,url:tmpArr},function(result){
                    $.unblockUI();
                    if(result.success)
                    {
                        allImage=result.data;
                        for(i=0;i<allImage.length;i++)
                        {
                            aImage=allImage[i];
                            $('#category'+type+' div.panel-body' ).innerHTML(
                                ' <div class=\'col-sm-2\' id=\'item_id_'+aImage.id+'\'>'
                                    +'<div class=\"imagebox\" >'
                                        +'<a href=\"'+aImage.url+'\" target=\"_blank\">'
                                            +'<img src=\"'+aImage.url+'\" alt=\"\" style=\"width:100%\"/>'
                                        +'</a>'
                                        +'<a class=\"btn btn-primary btn-sm btn_delete\" href=\"javascript:deleteItem('+aImage.id+');\">Xóa</a>'
                                    +'</div>'

                                +'</div>'
                            );



                        }
                    }
                    else
                    {
                        alert(""+result.msg);
                    }

                },'json');



        }

        function readURL(input) {

            $('#thumbnail').html('');
            for(var i = 0; i < 3; i++){

               if (input.files) {
                   var reader = new FileReader();

                   reader.onload = function (e) {

                       //$('#thumbnail').append('<img src=\"'+e.target.result+'\" alt=\"\"/>' );
                       $('#thumbnail').append('<div class=\"col-sm-4\">' +
                        '<a href=\"#\">' +
                         '<img src=\"'+e.target.result+'\" width=\"215px\" height=\"138px\" class=\"thumbnail \">' +
                          '</a>' +
                           '</div>' );

                   }

                   reader.readAsDataURL(input.files[i]);
               }

            }
        }

        $("#btn_submit_image").change(function(){
            readURL(this);
        });
    </script>

@endsection


