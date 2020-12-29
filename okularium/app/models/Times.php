<?php

use Illuminate\Database\Eloquent\Model as Model;

class Times extends Model {
    protected $table = 'times';
    protected $primaryKey = 'day';
    public $incrementing = false;
    public $timestamps = false;

    protected $day;
    protected $time_from;
    protected $time_to;

    public static function translate($day) {
        switch($day) {
            case 1:
                return 'Pondělí';
                break;
            case 2:
                return 'Úterý';
                break;
            case 3:
                return 'Středa';
                break;
            case 4:
                return 'Čtvrtek';
                break;
            case 5:
                return 'Pátek';
                break;
            case 6:
                return 'Sobota';
                break;
            case 7:
                return 'Neděle';
                break;
            default:
                return 'Chyba';
                break;
        }
    }
}