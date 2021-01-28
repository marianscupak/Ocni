<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $id_user;
    protected $email;
    protected $password;
    protected $role;

    public function exams() {
        return $this->hasMany(Exam::class, 'id_user');
    }
}