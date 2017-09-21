<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 20/09/2017
 * Time: 9:15 PM
 */

namespace App;


class Tournament extends Model
{
    protected $fillable = [
        'name','date_init','date_end'
    ];


    protected $hidden = [

    ];

    public function Season(){
        return $this->belongsTo('App\Season')->withTimestamps();
    }

    public function players(){
        return $this->belongsToMany('App\Players','tournament_player','tournament_id','player_id')->withPivot('player_number')->withTimestamps();
    }
}