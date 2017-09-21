<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 20/09/2017
 * Time: 9:13 PM
 */

namespace App;


class Player extends Model
{
    protected $fillable = [
        'name','height','weight','birth_date',
    ];


    protected $hidden = [

    ];

    public function club(){
        return $this->belongsTo('App\Club')->withTimestamps();
    }

    public function tournaments(){
        return $this->belongsToMany('App\Tournament','tournament_player','player_id','tournament_id')->withPivot('player_number')->withTimestamps();
    }
}