<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 20/09/2017
 * Time: 9:15 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name','date_init','date_end'
    ];


    protected $hidden = [

    ];

    public function season(){
        return $this->belongsTo('App\Season');
    }

    public function players(){
        return $this->belongsToMany('App\Player','tournament_player','tournament_id','player_id')->withPivot('player_number');
    }
}