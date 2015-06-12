<?php

class GameServer extends \Eloquent {
	protected $fillable = [];

    protected $table = 'gameservers';

    public function game(){
        return $this->belongsTo('Game');
    }
}