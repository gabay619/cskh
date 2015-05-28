<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 5/28/2015
 * Time: 9:30 AM
 */

class QuestionController extends \BaseController {


//    public function  getIndex(){
//        return View::make('frontend.home');
//    }

    public function index()
    {
        return View::make('frontend.question.index');

    }

    /**
     * Show the form for creating a new news
     *
     * @return Response
     */
    public function create()
    {
        return View::make('frontend.question.create');
    }

    /**
     * Store a newly created news in storage.
     *
     * @return Response
     */
    public function store()
    {


    }

    /**
     * Display the specified news.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified news.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified news in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {


    }

    /**
     * Remove the specified news from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }





}