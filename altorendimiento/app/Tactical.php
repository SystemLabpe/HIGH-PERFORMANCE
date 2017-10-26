<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 26/10/2017
 * Time: 5:02 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Tactical extends Model
{
    protected $table = "tacticals";

    protected $fillable = [
        'name','desc','tactical_type'
    ];


    protected $hidden = [

    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }


}