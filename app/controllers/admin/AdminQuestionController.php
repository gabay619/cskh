<?php

class AdminQuestionController extends \BaseController {

    /**
     * Display a listing of news
     *
     * @return Response
     */
    public function index()
    {

        $question = Question::orderBy("created_at","desc");

        if(Input::has('id'))
        {
            $question->where('id',Input::get('id'));
        }
        if(Input::has('title'))
        {
            $question->where('title','LIKE','%'.Input::get('title').'%');
        }
        if(Input::has('game_id'))
        {
            $question->where('game_id','=',Input::get('game_id'));
        }
        if(Input::has('server_id'))
        {
            $question->where('server_id','=',Input::get('server_id'));
        }
        if(Input::has('username'))
        {
            $question->where('username','=',Input::get('username'));
        }

        if(Input::has('start_date'))
        {
            $question->where('created_at','>=',date('y-m-d H:i:s',strtotime(Input::get('start_date'))));
        }
        if(Input::has('end_date'))
        {
            $question->where('created_at','<=',date('y-m-d H:i:s',strtotime(Input::get('end_date'))));
        }

        if(Input::has('status'))
        {
            $question->where('status','=',Input::get('status'));
        }
        $question= $question->paginate(15);


        // $questioncategories = Questioncategory::orderBy('order')->get();
        $allGames = Game::lists('name', 'id'); // array(1=>'Phong Thần', 2=> 'Võ Thần')
        $allGameserver = GameServer::lists('name', 'id');



        //$questioncategories=$this->getQuestionCategories($questioncategories);

        return View::make('admin.question.index')
            ->with('question',$question)
            ->with('allGames',$allGames)
            ->with('allGameserver',$allGameserver);

    }

    /**
     * Show the form for creating a new news
     *
     * @return Response
     */
    public function create()
    {
        $questioncategories = Questioncategory::orderBy('order')->get();
        $questioncategories=$this->getQuestionCategories($questioncategories);

        return View::make('admin.question.create')->with('newscategories',$questioncategories);
    }

    /**
     * Store a newly created news in storage.
     *
     * @return Response
     */
    public function store()
    {

        $validator = Validator::make($data = Input::all(), Question::$rules,Question::$error);


        if ($validator->fails())
        {

            return Redirect::back()->withErrors($validator)->withInput();
        }
        Question::create($data);
        return Redirect::route('admin.question.index')->with('success','Thêm mới thành công !');;
    }

    /**
     * Display the specified news.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        $allComment=Comment::where('question_id','=',$id)->get();
        $allImage=Upload::where('uploadable_id','=',$id)->get();

        return View::make('admin.question.show')->with(array(
            'question' => $question,
            'allComment' => $allComment,
            'allImage' => $allImage,

        ));
    }

    /**
     * Show the form for editing the specified news.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $questioncategories = Questioncategory::orderBy('order')->get();
        $questioncategories=$this->getQuestionCategories($questioncategories);
        $question = Question::find($id);
        if($question!=null)
        {
            return View::make('admin.question.edit')->with('newscategories',$questioncategories)->with('news',$question);
        }
        else
        {
            return Redirect::route('admin.question.index')->with('fail','Không tìm thấy dữ liệu !');
        }

    }

    /**
     * Update the specified news in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

        $question = Question::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Question::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $question->update($data);

        return Redirect::route('admin.question.index')->with('success','Sửa thành công !');
    }

    /**
     * Remove the specified news from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $id = Input::get('delete_id');
        if(!is_numeric($id))
        {
            return Redirect::route('admin.questioncategories.index')->with('fail','Không tìm thấy dữ liệu !');
        }
        $item = Question::find($id);
        if($item==null)
        {
            return Redirect::route('admin.questioncategories.index')->with('fail','Không tìm thấy dữ liệu !');

        }
        Question::destroy($id);
        return Redirect::route('admin.question.index')->with('success','Xóa thành công !');
    }




    public function  getQuestionCategories($questioncategory)
    {


        return $this->buildQuestionCategoryies($questioncategory);
    }

    public function  buildQuestionCategoryies($questioncategory,$idparrent=0,$chuoiSpe="")
    {


        $result = null;
        foreach($questioncategory as $item)
        {
            if($item->idparrent==$idparrent)
            {

                $result .="<option value='".$item->id."'>".HTML::entities($chuoiSpe.$item->title)."</option>";
                $result .=$this->buildQuestionCategoryies($questioncategory,$item->id,$chuoiSpe."--");

            }
        }
        return $result;

    }


    public function getResolved($id)
    {
        if(!is_numeric($id))
        {
            return Redirect::back()->with('fail', 'Không tìm thấy dữ liệu');
        }

        $question = Question::findOrFail($id);
        $data=array('solve'=>1);


        $question->update($data);

        return Redirect::route('admin.question.index')->with('success','Sửa thành công !');
    }


}
