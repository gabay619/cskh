@extends('frontend.layouts.default')

@section('head')
    {{ HTML::script('assets/libs/ckeditor/ckeditor.js') }}
    {{ HTML::script('assets/libs/ckfinder/ckfinder.js') }}

@endsection
@section('content')
    <div class="content">
        <div class="breacum tri-down">
            <h2>Gửi yêu cầu mới</h2>

        </div>
        <div class="block_infomation">

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

        @if(!$errors->isEmpty())
            <div class="alert alert-danger alert-dismissible user-message text-left" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        @if($errors->has('game_id'))
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                <span>{{ $errors->first('game_id') }}</span>
                            </p>
                        @endif
                        @if($errors->has('title'))
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                <span>{{ $errors->first('title') }}</span>
                            </p>
                        @endif
                        @if($errors->has('character_name'))
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                <span>{{ $errors->first('character_name') }}</span>
                            </p>
                        @endif
                        @if($errors->has('files[]'))
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                <span>{{ $errors->first('files[]') }}</span>
                            </p>
                        @endif
                        @if($errors->has('server_id'))
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                <span>{{ $errors->first('server_id') }}</span>
                            </p>
                        @endif
                        @if($errors->has('captcha'))
                            <p>
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">Error:</span>
                                <span>{{ $errors->first('captcha') }}</span>
                            </p>
                        @endif

                          {{--@if($errors->has())--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<div>{{ $error }}</div>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}



            </div>
        @endif

            {{ Form::open(array('url'=>'/question/store','method'=>'POST', 'files'=>true)) }}
            <div class="col-sm-6" style="padding-left: 0px !important;">
                <div class="form-group {{ $errors->has('game_id')? 'has-error':'' }}" style="margin-bottom: 9px; ">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal">Trò chơi/Hệ thống</label>
                   {{Form::select('game_id',array(''=>'Vui lòng chọn trò chơi / hệ thống')+$allGames,null, array('class'=>'form-control selectpicker show-tick'))}}

                </div>
            </div>
            <div class="col-sm-6" style="padding-right: 0px !important;">
                <div class="form-group {{ $errors->has('title')? 'has-error':'' }}" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Vấn đề</label>

                    {{ Form::text('title', Input::old('title'), array('id'=>'title','class' => 'form-control', 'placeholder' => 'Vui lòng nhập vấn đề')) }}
                </div>
            </div>
            <div class="col-sm-6" style="padding-left: 0px !important;">
                <div class="form-group {{ $errors->has('server_id')? 'has-error':'' }}" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal">Chọn máy chủ</label>

                    {{Form::select('server_id',array(''=>'Vui lòng chọn máy chủ')+$allGameserver,null, array('class'=>'form-control selectpicker show-tick'))}}
                </div>
            </div>
            <div class="col-sm-6" style="padding-right: 0px !important;">
                <div class="form-group {{ $errors->has('character_name')? 'has-error':'' }}" style="margin-bottom: 9px;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Tên nhân vật</label>
                    <input type="text" name="character_name" class="form-control" id="character_name" placeholder="Vui lòng nhập tên nhân vật">
                </div>
            </div>
            <div class="col-sm-12 nopadding" style="margin:10px 0 !important;" >
                <div class="form-group" style="margin-bottom: 9px;">
                    {{ Form::textarea('content', Input::old('content'), array('class'=>'form-control ','id'=>'contentContainer'))}}
                    <script>

                    CKEDITOR.replace('contentContainer', {
                    	toolbar: [
                    		{ name: 'document', items: ['NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                    		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
                    		//'/',																					// Line break - next group will be placed in new line.
                    		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline' ] },
                    		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    		{ name: 'links', items: [ 'Link', 'Unlink' ] },
                            { name: 'insert', items: [ 'Image' ] },
                            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
                    	]
                    });


                    </script>



                </div>
            </div>

            <div class="row nopadding">
                <div class="col-sm-3" style="padding-left: 0px !important;padding-right: 0 !important;">
                    <div class="fileUpload btn ">
                        <span>Upload ảnh</span>
                        {{--<input type="file"   class="upload" id="btn_submit_image" multiple />--}}
                        {{ Form::file('files[]', array('id'=>'btn_submit_image','class'=>'upload','multiple'=>true)); }}
                    </div>
                    {{--<button class="btn btn-uploadpic" style="width: 147px !important"  type="button" onclick="performClick('character_name');">Upload ảnh</button>--}}
                </div>
                <div class="col-sm-3 nopadding" style="width: 15% !important;">
                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal;margin-top: 5px" >Nhập captcha</label>
                </div>
                <div class="col-sm-3 nopadding">
                @captcha('chargeCaptcha')

                </div>
                <div class="col-sm-3 nopadding form-group {{ $errors->has('captcha')? 'has-error':'' }} " >
                    <input type="text" name="captcha" class="form-control" style="border-radius: 0 !important;" placeholder="Vui nhập captcha">
                </div>
            </div>


            <div id="thumbnail" style="margin-top: 10px;"></div>


            <div class="col-sm-12" style="padding:15px 0 0px 0; margin:10px 0px 20px 0;border-top:1px solid #dedede;border-bottom:1px solid #dedede" >
                <div class="form-group">
                    <button class="btn btn_guiyeucau" type="submit">Gửi yêu cầu</button>
                </div>
            </div>
            {{ Form::close() }}

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


