<?php

use Illuminate\Database\Eloquent\Model as Model;

class Glasses extends Model {

    protected $table = 'glasses';
    protected $primaryKey = 'id_glasses';
    public $timestamps = false;

    protected $name;
    protected $price;
    protected $gender;
    protected $img_count;
    protected $date;
}