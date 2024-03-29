<?php

use Illuminate\Database\Eloquent\Model as Model;

class Pricelist extends Model {
    protected $table = 'pricelist';
    protected $primaryKey = 'name';
    public $incrementing = false;
    public $timestamps = false;

    protected $id_price;
    protected $name;
    protected $price;
    protected $note;
}