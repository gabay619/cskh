@extends('frontend.layouts.default')

@section('head')


@endsection
@section('content')
    <div class="content">
        <div class="breacum tri-down">
           <h2>DANH SÁCH YÊU CẦU KẾT THÚC</h2>
           <a href="/question/create" class="btn_new"><span class="glyphicon icon_new" style="margin-right: 10px;color:#fff;font-size: 17px"></span>Yêu cầu mới</a>


        </div>
        <div class="block_infomation list_yeucau">
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
                    <table class="table table-striped table_yc">

                        <tbody>
                        @foreach($allQuestion as $question)

                         <tr>

                            <td class="col-md-6">
                                <a href="/question/show/{{{$question->id}}}">
                                    <span class="glyphicon  icon-arrow" aria-hidden="true"></span>
                                    {{{$question->title}}}

                                </a>
                            </td>
                            <td class="col-md-3">Gửi lúc: {{{$question->created_at->format('h')}}}h, {{{$question->created_at->format('d/m')}}}</td>
                            <td class="col-md-2">Trả lời: 19h, 30/10</td>
                            <td class="col-md-1"><a href="/question/delete/{{{$question->id}}}"></a></td>

                        </tr>


                        @endforeach

                        </tbody>
                    </table>


                </div>
    </div>



    {{--<!-- Delete item Modal -->--}}
   {{--<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
     {{--<div class="modal-dialog">--}}
       {{--<div class="modal-content">--}}
           {{--{{Form::open(array('route'=>'admin.news.destroy','class'=>'form-horizontal','method'=>'delete'))}}--}}
              {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                {{--<h4 class="modal-title">Bạn muốn xóa?</h4>--}}
              {{--</div>--}}
              {{--<div class="modal-body">--}}
                {{--<p>Are you sure you want to delete?</p>--}}
              {{--</div>--}}
              {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>--}}
                {{--<input type="hidden" name="delete_id" id="postvalue" value="" />--}}
                {{--<input type="submit" class="btn btn-danger" value="Delete Item" />--}}
              {{--</div>--}}

          {{--{{ Form::close(); }}--}}
       {{--</div><!-- /.modal-content -->--}}
     {{--</div><!-- /.modal-dialog -->--}}
   {{--</div>--}}
   {{--<!-- Delete .modal -->--}}

@endsection