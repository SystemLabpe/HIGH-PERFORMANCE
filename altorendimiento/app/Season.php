<?php
/**
 * Created by PhpStorm.
 * User: josue
 * Date: 12/09/2017
 * Time: 5:22 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = [
        'name','date_init','date_end'
    ];


    protected $hidden = [

    ];

    public function club(){
        return $this->belongsTo('App\Club');
    }
}