
@extends('admin.layouts.default')

@section('head')

{{ HTML::script('assets/libs/bootstrap-tag-input/bootstrap-tagsinput.min.js') }}
{{ HTML::style('assets/libs/bootstrap-tag-input/bootstrap-tagsinput.css') }}
{{ HTML::script('assets/libs/bootstrap-fileinput/js/fileinput.min.js') }}
{{ HTML::style('assets/libs/bootstrap-fileinput/css/fileinput.min.css') }}
{{ HTML::script('assets/libs/bootstrap-select/bootstrap-select.min.js') }}
{{ HTML::style('assets/libs/bootstrap-select/bootstrap-select.min.css') }}
{{ HTML::script('assets/libs/ckeditor/ckeditor.js') }}
{{ HTML::script('assets/libs/ckfinder/ckfinder.js') }}






@endsection
@section('content')
<div class="row">
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
                            <a href="{{{$allImage[$i]['path']==""?"#":"/uploads/".$allImage[$i]['path']}}}">
                                <img src="{{{$allImage[$i]['path']==""?"/assets/images/noimage.jpg":"/uploads/".$allImage[$i]['path']}}}" width="215px" height="138px" class="thumbnail ">
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

                    @foreach($allComment as $item)
                        @if($item->is_admin==1)
                            <div class="reply_block reply_admin">
                                <div class="breadcum tri-down">
                                    <h2 class="">Admin - Quản trị viên:</h2>
                                    <img src="/assets/images/reply_arrow.png" alt=""/>

                                </div>
                                <div class="message">
                                    {{$item->content}}
                                </div>
                            </div>
                        @else
                             <div class="reply_block">
                                <div class="breadcum tri-down">
                                    <h2 class="">{{{$question->user->username}}}</h2>

                                </div>
                                <div class="message">
                                    {{$question->content}}
                                </div>
                            </div>

                        @endif
                    @endforeach

                    <p class="question_done"></p>
                    <div class="" id="block_form_continous">
                        <form action="/admin/question/comment/{{$question->id}}" method="POST">
                            <div class="col-sm-12 nopadding" >
                                <div class="form-group">
                                    <label style="font-family: 'Calibri';font-size: 15px;color: #3a3a3a;font-weight: normal" >Nội dung</label>
                                    {{ Form::textarea('content', Input::old('content'), array('class'=>'form-control ','id'=>'contentContainer'))}}
                                <script>CKEDITOR.replace('contentContainer');</script>
                                </div>
                            </div>



                            <div class="col-sm-12" style="padding:15px 0 0px 0; margin:10px 0px 20px 0;border-top:1px solid #dedede;border-bottom:1px solid #dedede" >
                                <div class="form-group pull-right">
                                    <a href="/admin/question/solved/{{$question->id}}"  class="btn btn-sm btn-primary">Đã giải quyết xong</a>

                                    <input class="btn btn-success btn-sm" type="submit" value="Trả lời" />
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
@endsection