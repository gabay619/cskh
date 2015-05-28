<?php
/**
 * Created by PhpStorm.
 * User: Tan
 * Date: 5/28/2015
 * Time: 9:30 AM
 */

class HomeController extends \BaseController {


    public function  getIndex(){
        return View::make('frontend.pages.home');
    }


}