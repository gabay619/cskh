@extends('admin.layouts.default')

@section('head')

{{ HTML::script('assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
{{ HTML::style('assets/libs/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::script('assets/libs/jquery-tablesorter/jquery.tablesorter.min.js') }}







@endsection
@section('content')
    <div class="row">
        <div class="col-sm-10">
            <h3>Quản lý câu hỏi</h3>
        </div>
        {{--<div class="col-sm-2">--}}
            {{--<a class="btn btn-primary pull-right" href="{{URL::route('admin.question.create')}}" style="margin-top: 15px">Thêm mới</a>--}}

        {{--</div>--}}
    </div>
    <div class="row">
        <div class="col-sm-12"><label for="">Tìm kiếm theo nhóm:</label></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{ Form::open(array('route'=>'admin.question.index','method'=>'GET','class'=>'form-horizontal')) }}
            <div class="form-group">


                <div class="col-xs-1">
                    {{Form::text('id',Input::get('id'),array('class'=>'form-control input-sm','placeholder'=>'ID'))}}
                </div>
                <div class="col-xs-2">
                    {{Form::text('title',Input::get('username'),array('class'=>'form-control input-sm','placeholder'=>'Username:'))}}
                </div>
                <div class="col-xs-2">
                    {{Form::text('title',Input::get('title'),array('class'=>'form-control input-sm','placeholder'=>'Tiêu đề:'))}}
                </div>

                <div class="col-xs-2">
                    {{Form::select('game_id',array(''=>'-- Chọn game --')+$allGameserver,null, array('id'=>'cboServerId','class'=>'form-control selectpicker show-tick'))}}

                    <script>$("#cboServerId").val("{{Input::get('server_id')}}");</script>
                </div>
                <div class="col-xs-2">
                    {{Form::select('game_id',array(''=>'-- Máy chủ --')+$allGames,null, array('id'=>'cboGameId','class'=>'form-control selectpicker show-tick'))}}
                    <script>$("#cboGameId").val("{{Input::get('game_id')}}");</script>
                </div>




                <div class="col-xs-2" >
                    <div  class="input-group date form_start_date " data-time="00:00:00">
                        {{Form::text('start_date',Input::get('start_date'),array('class'=>'form-control input-sm','placeholder'=>'Từ:','id'=>'start_date'))}}

					    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>

                </div>
                <div class="col-xs-2">
                    <div  class="input-group date form_start_date ">
                        {{Form::text('end_date',Input::get('end_date'),array('class'=>'form-control input-sm','placeholder'=>'Đến:','id'=>'end_date'))}}

					    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                    </div>
                </div>

                <div class="col-xs-2">
                    {{Form::select('solved',array(''=>'-- Trạng thái --','1'=>'Đã giải quyết','0'=>'Chưa giải quyết'),Input::get('solved'),array('class'=>'form-control input-sm'))}}
                </div>


                 <div class="col-xs-1">
                    <button type="submit" class="btn btn-success btn-sm">Tìm</button>
                </div>
            </div>
        {{ Form::close() }}
        </div>
    </div>





    <div class="row">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover tablesorter" id="myTable">
                <thead>
                    <tr>
                        <th class="header headerSortUp text-nowrap">ID &nbsp;<i class="fa fa-sort"></i> </th>
                        <th class="header headerSortUp text-nowrap">Tiêu đề &nbsp;<i class="fa fa-sort"></i></th>
                        <th class="header headerSortUp text-nowrap">Game &nbsp;<i class="fa fa-sort"></i></th>
                        <th class="header headerSortUp text-nowrap">Server &nbsp;<i class="fa fa-sort"></i></th>
                        <th class="header headerSortUp text-nowrap">Username &nbsp;<i class="fa fa-sort"></i></th>
                        <th class="header headerSortUp text-nowrap">Ngày tạo&nbsp;<i class="fa fa-sort"></i></th>
                        <th class="header headerSortUp text-nowrap">Status &nbsp;<i class="fa fa-sort"></i></th>
                        <th class="header">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($question as $item)
                    <tr>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{ $item->id }}</a></td>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{{ $item->title }}}</a></td>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{{ $item->game->name }}}</a></td>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{{ $item->gameserver->name }}}</a></td>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{{ $item->user->username }}}</a></td>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{{ $item->created_at }}}</a></td>
                        <td><a href="{{URL::route("admin.question.show",$item->id)}}">{{ $item->solve==1?"<img src=".Asset('assets/backend/images/check.png')." alt='Active' />":"<img src=".Asset('assets/backend/images/uncheck.png')." alt='Unactive' />" }}</a></td>
                        <td class="text-nowrap">
                            <div class="pull-right ">
                                <a href="{{URL::route("admin.question.show",$item->id)}}" class="btn btn-sm btn-primary">Trả lời</a>
                                <a href="#" class="btn btn-sm btn-danger delete_toggle" rel="{{ $item->id }}">Xóa</a>
                            </div>
                        </td>

                    </tr>

                @endforeach

                </tbody>




            </table>

            {{--<div class="text-center">--}}
            {{--{{$news->appends(array(--}}
                {{--'id'=>Input::get('id'),--}}
                {{--'title'=>Input::get('title'),--}}
                {{--'start_date'=>Input::get('start_date'),--}}
                {{--'end_date'=>Input::get('end_date'),--}}
                {{--'idnewscategories'=>Input::get('idnewscategories'),--}}
                {{--'status'=>Input::get('status'),--}}
                {{--))->links()}}--}}
            {{--</div>--}}
        </div>

    </div>



    <!-- Delete item Modal -->
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
           {{Form::open(array('route'=>'admin.question.destroy','class'=>'form-horizontal','method'=>'delete'))}}
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Bạn muốn xóa?</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="hidden" name="delete_id" id="postvalue" value="" />
                <input type="submit" class="btn btn-danger" value="Delete Item" />
              </div>

          {{ Form::close(); }}
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div>
   <!-- Delete .modal -->
   <script>

    $(document).ready(function(){

          $('.delete_toggle').each(function(index,elem) {
              $(elem).click(function(e){
                e.preventDefault();
                $('#postvalue').attr('value',$(elem).attr('rel'));
                $('#deleteModal').modal('toggle');
              });
          });
          $("#myTable").tablesorter();

    });

    $('.form_start_date').datetimepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: 'yyyy-mm-dd 00:00'
        });
    $('.form_end_date').datetimepicker({
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0,
        format: 'yyyy-mm-dd 00:00'
        });



</script>
@endsection