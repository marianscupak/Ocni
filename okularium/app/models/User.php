<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $id_user;
    protected $login;
    protected $password;
    protected $role;
}