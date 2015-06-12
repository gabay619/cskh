<?php

/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 5/28/2015
 * Time: 9:30 AM
 */
class QuestionController extends \BaseController
{


//    public function  getIndex(){
//        return View::make('frontend.home');
//    }

    public function getIndex()
    {
        $allQuestion=Question::orderBy('created_at','desc')->get();
        return View::make('frontend.question.index')->with(array('allQuestion'=>$allQuestion));

    }

    /**
     * Show the form for creating a new news
     *
     * @return Response
     */
    public function getCreate()
    {
        $allGames = Game::lists('name', 'id'); // array(1=>'Phong Thần', 2=> 'Võ Thần')
        $allGameserver = GameServer::lists('name', 'id');
        $allProblem = Problem::lists('title', 'id');


        return View::make('frontend.question.create')->with(array(
            'allGames' => $allGames,
            'allGameserver' => $allGameserver,
            'allProblem' => $allProblem

        ));
    }

    /**
     * Store a newly created news in storage.
     *
     * @return Response
     */
    public function postStore()
    {


        $input = Input::all();

        $rules = array(
            'game_id' => 'required|numeric',
            'title' => 'required',
            'server_id' => 'required|numeric',
            'character_name' => 'required',
            //'captcha' => 'required|captcha',

        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {


            return Redirect::back()->withErrors($validator)->withInput();
        }
        //check image
        $files = Input::file('files');

        $i = 0;
        foreach ($files as $file) {
            if ($i < 3)
            {
                $rulesImage = array(
                    'file' => 'image|max:10000',
                );
                 $error = array(
                    'file.image' => 'Không đúng định dạng ảnh',
                     'file.max'=>'Hình ảnh upload không được vượt quá 10MB'
                 );

                $validator = Validator::make(array('file' => $file), $rulesImage,$error);

                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }

            }
            $i++;
        }
        $input['user_id']=Auth::user()->id;
        //create question
        $newQuest = new Question();
        $newQuest=$newQuest::create($input);


        $files = Input::file('files');
        $destinationPath = 'uploads';
        $random = sha1(time().time());
        foreach($files as $file){
            $fullPath=$random."_". $file->getClientOriginalName();
            $upload_success = $file->move($destinationPath,$random."_". $file->getClientOriginalName());
            //save ảnh
            $newUpload = new Upload();
            $newUpload->uploadable_id = $newQuest->id;
            $newUpload->path=$random."_". $file->getClientOriginalName();
            $newUpload->type = QUESTION_IMG_TYPE;
            $newUpload->save();

        }
        return Redirect::to('/question/create')->with('success', 'Gửi yêu cầu thành công !');



//        $id = 1;
//        $allImg = Upload::where('uploadable_id', $id)->where('type', QUESTION_IMG_TYPE);

//        $files = Input::file('files');
//        $destinationPath = 'uploads';
//        foreach($files as $file){
//            $upload_success = $file->move($destinationPath, $file->getClientOriginalName());
//            if( $upload_success ) {
//                echo 'success';
//            } else {
//                echo 'failed';
//            }
//        }
//        exit;


    }

    /**
     * Display the specified news.
     *
     * @param  int $id
     * @return Response
     */
    public function getShow($id)
    {
        //return $id;
        if(!is_numeric($id))
        {
             return Redirect::back()->with('fail', 'Không tìm thấy dữ liệu');
        }
        $question=Question::find($id);
        $allComment=Comment::where('question_id','=',$id)->get();
       $allImage=Upload::where('uploadable_id','=',$id)->get();

        return View::make('frontend.question.show')->with(array(
            'question' => $question,
            'allComment' => $allComment,
             'allImage' => $allImage,

        ));

    }

    /**
     * Show the form for editing the specified news.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified news in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {


    }

    public function getUpdate()
    {

    }

    /**
     * Remove the specified news from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function getDelete($id)
    {

        if(!is_numeric($id))
        {
             return Redirect::back()->with('fail', 'Xóa không thất bại');
        }
        Question::find($id);
        $question=Question::find($id);
        if($question->user_id==Auth::user()->id)
        {

            Question::destroy($id);
            return Redirect::back()->with('success','Xóa thành công !');
        }
        return Redirect::back()->with('fail', 'Bạn không có quyền xóa yêu cầu này !');

    }


}