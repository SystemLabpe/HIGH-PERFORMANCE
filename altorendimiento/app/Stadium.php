<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 27/09/2017
 * Time: 12:16 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{

    protected $fillable = [
        'name'
    ];


    protected $hidden = [

    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }



}