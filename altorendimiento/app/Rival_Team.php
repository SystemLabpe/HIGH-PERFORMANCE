<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 27/09/2017
 * Time: 12:16 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rival_Team extends Model
{

    protected $table = "rival_teams";

    protected $fillable = [
        'name','picture'
    ];


    protected $hidden = [

    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }

}