<?php

class Question extends \Eloquent {
	protected $fillable = ['game_id','server_id','user_id','character_name','title','content','phone','solve'];

    protected $table = 'questions';


    public function gameserver(){
		return $this->belongsTo('GameServer','game_id');
	}

    public function user(){
		return $this->belongsTo('User');
	}
    public function game(){
		return $this->belongsTo('Game');
	}
}