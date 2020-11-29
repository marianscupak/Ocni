<?php

use Illuminate\Database\Eloquent\Model as Model;

class Glasses extends Model {
    public static $per_page = 12;
    protected $table = 'glasses';
    protected $primaryKey = 'id_glasses';
    public $timestamps = false;

    protected $id_glasses;
    protected $name;
    protected $price;
    protected $gender;
    protected $img_count;
    protected $date;

    public static function get_limits() {
        $max = Glasses::max('price');
        $min = Glasses::min('price');

        return ['max' => $max, 'min' => $min];
    }

    /*public static function make_pagination() {
        $params = $_GET['url'];

        $page = isset($_GET['p'])? intval($_GET['p']) : 1;

        $result = $conn->query($sql);
        $count = $result->num_rows;
                    
        $pageCount = ceil($count / Glasses::$perPage);

        $url = "glasses.php?";
        if ($filters != NULL) {
            foreach ($filters as $key => $value) {
                if ($key != 'p') {
                    $url = $url . $key . '=' . $value . '&';
                }                                                            
            }
        }

        if ($pageCount > 1) {
            echo '<li><a href="';
            if ($page > 1) {
                echo $url . 'p=' . ($page - 1);
            }
            else {
                echo '" class="disabledPagination';
            }
            echo '">Předchozí</a></li>';
        }                        

        for ($i = 1; $i <= $pageCount; $i++) {
            echo '<li><a href="' . $url . 'p=' . $i . '"';                
            if ($i == $page) {
                echo ' class="activePage"';
            }
            echo '>' . $i . '</a></li>';
        }

        if ($pageCount > 1) {
            echo '<li><a href="';
            if ($page < $pageCount) {
                echo $url . 'p=' . ($page + 1);
            }
            else {
                echo '" class="disabledPagination';
            }
            echo '">Následující</a></li>';
        }
    }*/
}