<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 27/09/2017
 * Time: 12:17 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Match extends Model
{

    protected $table = "matchs";

    protected $fillable = [
        'match_date','is_local','local_score','visitor_score'
    ];


    protected $hidden = [

    ];

    public function tournament(){
        return $this->belongsTo('App\Tournament');
    }

    public function rival_team(){
        return $this->belongsTo('App\Rival_Team');
    }

    public function stadium(){
        return $this->belongsTo('App\Stadium');
    }

    public function players(){
        return $this->belongsToMany('App\Player','player_match','match_id','player_id')
            ->withPivot('good_pass','bad_pass','short_pass','medium_pass','long_pass','internal_edge','external_edge','instep','taco','tigh','chest','head')
            ->withTimestamps();
    }


}