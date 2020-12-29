<?php

use Illuminate\Database\Eloquent\Model as Model;

class Exam extends Model {
    protected $table = 'exams';
    protected $primaryKey = ['date', 'time'];
    public $incrementing = false;
    public $timestamps = false;

    protected $id_user;
    protected $date;
    protected $time;
    protected $reason;

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}