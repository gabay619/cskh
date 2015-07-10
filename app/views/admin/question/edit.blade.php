
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
        <div class="col-sm-12">
            <h3><a href="{{URL::route(question)}}">Quản lý tin tức</a> » Sửa "{{{ $news->title }}}"</h3>

            {{ Form::open(array('route'=>array('admin.news.update',$news->id),'class'=>'form-horizontal form-top-margin','role'=>'form','method'=>'PUT','style'=>'margin-top: 15px;')) }}
                <div class="form-group {{ $errors->has('title')? 'has-error':'' }}">
                        <label for="title" class="col-lg-2 control-label">Tiêu đề(*)</label>
                        <div class="col-lg-10">
                            {{ Form::text('title', Input::old('title',$news->title), array('id'=>'title','class' => 'form-control', 'placeholder' => 'Nhập tiêu đề')) }}
                            @if($errors->has('title'))
                                <p>{{ $errors->first('title') }}</p>
                            @endif

                        </div>
                </div>
                <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Mô tả</label>
                        <div class="col-lg-10">
                            {{ Form::textarea('description', Input::old('description',$news->description), array('class' => 'form-control', 'placeholder' => 'Nhập mô tả','style'=>'height:60px')) }}
                        </div>
                </div>

                <div class="form-group">
                        <label for="Keyword" class="col-lg-2 control-label">Keyword</label>
                        <div class="col-lg-10">
                            {{ Form::text('keyword', Input::old('keyword',$news->keyword), array('class' => 'form-control', 'placeholder' => 'Nhập các từ khóa (cách nhau bởi dấu phẩy)')) }}
                        </div>
                </div>
                {{-- Tags --}}
                <div class="form-group">
                    <label for="Tags" class="col-lg-2 control-label">Tags</label>
                    <div class="col-lg-10">
                        {{ Form::text( "tags" , Input::old( "tags",$news->tags ) , array('data-role'=>'tagsinput',  'class'=>'form-control' , 'placeholder'=>'Nhập các tag' ) ) }}
                    </div>

                </div>

                {{-- Content --}}
                <div class="form-group">
                    <label for="Content" class="col-lg-2 control-label">Nội dung</label>

                    <div class="col-lg-10">
                        {{--<text  style="min-height: 250px ;border: 1px solid #CCC; background-color: #fff" id="contentContainer"></div>--}}
                        {{ Form::textarea('content', Input::old('content',$news->content), array('class'=>'form-control ','id'=>'contentContainer'))}}
                        <script>CKEDITOR.replace('contentContainer');</script>

                    </div>
                </div>


                {{-- Upload ảnh --}}
                <div class="form-group " >
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <span class="file-input">
                            <div class="file-preview ">
                                    <div class="close fileinput-remove"><a onclick="removeTopicImg()">×</a></div>
                                    <div class="">
                                    <div class="file-preview-thumbnails">


                                        <div data-fileindex="init_1" id="preview-1421999232147-init_1" class="file-preview-frame file-preview-initial">
                                           <img id="imgTopic" title="The Earth" alt="The Earth" class="file-preview-image" src="{{Input::old('image',$news->image)!=""? Input::old('image',$news->image): Asset('assets/libs/bootstrap-fileinput/img/none.gif') }}">

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                                    <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                                    </div>
                            </div>
                            <div class="kv-upload-progress hide"></div>
                            <div class="input-group  {{ $errors->has('image')? 'has-error':'' }}">

                                {{ Form::text('image', Input::old('image',$news->image), array('id'=>'spnFileName','class' => 'form-control', 'placeholder' => 'Chọn ảnh đại diện')) }}

                               <div class="input-group-btn">
                                   <a onclick="removeTopicImg();" id="btnRemoveTopicImg" class="btn btn-default fileinput-remove fileinput-remove-button" title="Clear selected files" type="button"><i class="glyphicon glyphicon-trash"></i> Remove</a>
                                   {{--<button class="hide btn btn-default fileinput-cancel fileinput-cancel-button" title="Abort ongoing upload" type="button"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>--}}
                                   {{--<button class="btn btn-default kv-fileinput-upload fileinput-upload-button" title="Upload selected files" type="submit"><i class="glyphicon glyphicon-upload"></i> Upload</button>--}}
                                   <a  onclick="getTopicImg();" class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse …  </a>
                               </div>
                            </div>
                            @if($errors->has('image'))
                                 <p>{{ $errors->first('image') }}</p>
                            @endif
                        </span>
                    </div>



                    {{-- Upload Thubnail --}}
                    <div class="col-lg-5">
                        <span class="file-input">
                            <div class="file-preview ">
                                    <div class="close fileinput-remove"><a onclick="removeThumbImg()">×</a></div>
                                    <div class="">
                                    <div class="file-preview-thumbnails">


                                        <div data-fileindex="init_1" id="preview-1421999232147-init_1" class="file-preview-frame file-preview-initial">
                                           <img id="imgThumb" title="The Earth" alt="The Earth" class="file-preview-image"  src="{{Input::old('thumbnail',$news->thumbnail)!=""? Input::old('thumbnail',$news->thumbnail): Asset('assets/libs/bootstrap-fileinput/img/none.gif') }}">

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>    <div class="file-preview-status text-center text-success"></div>
                                    <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                                    </div>
                            </div>
                            <div class="kv-upload-progress hide"></div>
                            <div class="input-group {{ $errors->has('thumbnail')? 'has-error':'' }}  ">
                                {{ Form::text('thumbnail', Input::old('thumbnail',$news->thumbnail), array('id'=>'spnThumbFileName','class' => 'form-control', 'placeholder' => 'Chọn ảnh thubnail')) }}


                               @if($errors->has('thubnail'))
                                <p>{{ $errors->first('thubnail') }}</p>
                                @endif


                               <div class="input-group-btn">
                                   <a onclick="removeThumbImg();" id="btnRemoveThumbImg" class="btn btn-default fileinput-remove fileinput-remove-button" title="Clear selected files" type="button"><i class="glyphicon glyphicon-trash"></i> Remove</a>
                                   {{--<button class="hide btn btn-default fileinput-cancel fileinput-cancel-button" title="Abort ongoing upload" type="button"><i class="glyphicon glyphicon-ban-circle"></i> Cancel</button>--}}
                                   {{--<button class="btn btn-default kv-fileinput-upload fileinput-upload-button" title="Upload selected files" type="submit"><i class="glyphicon glyphicon-upload"></i> Upload</button>--}}
                                   <a  onclick="getThumbImg();" class="btn btn-primary btn-file"> <i class="glyphicon glyphicon-folder-open"></i> &nbsp;Browse …  </a>
                               </div>
                            </div>
                        </span>
                    </div>

                </div>

                {{-- Sub Category --}}
                <div class="form-group {{ $errors->has('idnewscategories')? 'has-error':'' }}">
                    <label for="NewcategoriesSub" class="col-lg-2 control-label">Danh mục</label>
                    <div class="col-lg-10">

                        <select id="cboSubCategory" name="idnewscategories"  class="selectpicker show-tick"  title="Không chọn">
                            <option value="">Không chọn</option>
                            {{$newscategories}}

                        </select>
                        @if($errors->has('idnewscategories'))
                                <p>{{ $errors->first('idnewscategories') }}</p>
                        @endif
                        <script>$("#cboSubCategory").val("{{Input::old('idnewscategories',$news->idnewscategories)}}");</script>


                    </div>
                </div>




                <div class="form-group">
                        <label for="status" class="col-lg-2 control-label">Active</label>
                        <div class="col-lg-10">
                            {{ Form::hidden('status', 0) }}
                            {{Form::checkbox('status', '1', Input::old('status', $news->status),array('style'=>'margin:10px 0 0 0')) }}

                        </div>

                </div>
                <div class="form-group pull-right">
                       <a  class="btn btn-default"  href="{{URL::route('admin.news.index')}}">Cancel</a>
                       <button type="submit" class="btn btn-primary">Save</button>
                </div>



            {{ Form::close() }}

        </div>
    </div>
@endsection

@section('javascriptApp')
<script language="javascript" type="text/javascript">

    $(function() {
        $('#title').focus();
    });
    $(document).ready(function(){


        $('#btnRemoveTopicImg').hide();
        $('#btnRemoveThumbImg').hide();
    })

    function getTopicImg(){

        try{

            var finder = new CKFinder();
            finder.basePath = '/assets/libs/ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
            finder.selectActionFunction = setTopicFile;
            finder.popup();
        }catch(err){

        }
    }

    function getThumbImg(){

        try{
            var finder = new CKFinder();
            finder.basePath = '/assets/libs/ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
            finder.selectActionFunction = setThumbFile;
            finder.popup();
        }catch(err){

        }
    }


     function setTopicFile(fileUrl){
        $("#imgTopic").attr("src",  fileUrl );
        $("#btnRemoveTopicImg").show();
        $('#spnFileName').val(fileUrl);


     }

     function removeTopicImg(){
        $("#imgTopic").attr("src",  '{{ Asset('assets/libs/bootstrap-fileinput/img/none.gif') }}' );
        $("#btnRemoveTopicImg").hide();
        $('#spnFileName').val('');
    }

    function getThumbImg(){

        try{
            var finder = new CKFinder();
            finder.basePath = '/assets/libs/ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
            finder.selectActionFunction = setThumbFile;
            finder.popup();
        }catch(err){

        }
    }

    function setThumbFile(fileUrl){
        $("#imgThumb").attr("src",  fileUrl );
        $("#btnRemoveThumbImg").show();
        $('#spnThumbFileName').val(fileUrl);
    }

    function removeThumbImg(){
        $("#imgThumb").attr("src",  '{{ Asset('assets/libs/bootstrap-fileinput/img/none.gif') }}' );
        $("#btnRemoveThumbImg").hide();
        $('#spnThumbFileName').val('');
    }
    $('.selectpicker').selectpicker('{{Input::old('idnewscategories')}}');




</script>

  {{--@if($errors->has())--}}
    {{--@foreach ($errors->all() as $error)--}}
        {{--<div>{{ $error }}</div>--}}
    {{--@endforeach--}}
{{--@endif--}}
@endsection


