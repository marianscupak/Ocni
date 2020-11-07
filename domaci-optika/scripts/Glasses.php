<?php
    class Glasses {
        public $id;
        public $name;
        public $price;
        public $gender;
        public $imgCount;
        static private $perPage = 12;

        function __construct($id, $name, $price, $gender, $imgCount) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->gender = $gender;
            $this->imgCount = $imgCount;
        }

        function display() {
            echo '
                <div class="glassesContainer">
                    <a href="glasses_detail.php?id=' . $this->id . '" class="imageContainer">
                        <img src="assets/img/glasses/glasses_' . $this->id . '_1.jpg" alt="Brýle">
                    </a>
                    <a href="glasses_detail.php?id=' . $this->id . '" class="glassesName"><h2>' . $this->name . '</h2></a>
                    <h3>' . number_format($this->price, 0, ',', ' ') . ' Kč</h3>
                    <div class="glassesDetail"><a href="glasses_detail.php?id=' . $this->id . '">Detail</a></div>
                </div>
            ';
        }

        private static function makeSQL($filters) {
            $sql = "SELECT *
                    FROM glasses";

            if (!empty($filters['gender']) && $filters['gender'] != 'u') {
                $sql .= " WHERE (gender LIKE '" . $filters['gender'] . "'" . " OR gender LIKE 'u')";
            }
            else if (!empty($filters['gender'])) {
                $sql .= " WHERE gender LIKE 'u'"; 
            }
            
            if (!empty($filters['priceFrom'])) {
                if (substr_compare($sql, "glasses", -7) == 0) {
                    $sql .= " WHERE price >= '" . $filters['priceFrom'] . "'";
                }
                else {
                    $sql .= " AND price >= '" . $filters['priceFrom'] . "'";
                }
            }

            if (!empty($filters['priceTo'])) {
                if (substr_compare($sql, "glasses", -7) == 0) {
                    $sql .= " WHERE price <= '" . $filters['priceTo'] . "'";
                }
                else {
                    $sql .= " AND price <= '" . $filters['priceTo'] . "'";
                }
            }

            if (!empty($filters['order'])) {
                $sql .= " ORDER BY ";
                switch ($filters['order']) {
                    case 'priceAsc':
                        $sql .= "price";
                        break;
                    case 'priceDesc':
                        $sql .= "price DESC";
                        break;
                    case 'dateAsc':
                        $sql .= "date";
                        break;
                    case 'dateDesc':
                        $sql .= "date DESC";
                        break;
                }
            }

            return $sql;
        }

        static function loadGlasses($filters, $pagination) {
            require("database.php");
            
            $page = (!empty($_GET['p']))? intval($_GET['p']) : 1;
            $firstShown = ($page - 1) * Glasses::$perPage;

            $sql = Glasses::makeSQL($filters);
            if ($pagination) {
                $sql .= " LIMIT " . $firstShown . ", " . Glasses::$perPage;
            }

            $result = $conn->query($sql);

            $glasses = array();
            while ($row = $result->fetch_assoc()) {
                $glasses[] = new Glasses($row['id_glasses'], $row['name'], $row['price'], $row['gender'], $row['img_count']);
            }

            $conn->close();
            return $glasses;
        }

        static function findGlasses($id) {
            require("database.php");
            $sql = "SELECT * FROM glasses WHERE id_glasses = '" . $id . "'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            return new Glasses($row['id_glasses'], $row['name'], $row['price'], $row['gender'], $row['img_count']);
        }

        static function findLimits($glasses) {
            require("database.php");
            $lowest = $conn->query("SELECT price FROM glasses ORDER BY price LIMIT 1");
            $lowest = $lowest->fetch_assoc();

            $highest = $conn->query("SELECT price FROM glasses ORDER BY price DESC LIMIT 1");
            $highest = $highest->fetch_assoc();

            $limits = array("lowest" => $lowest["price"], "highest" => $highest["price"]);

            $conn->close();
            return $limits;
        }

        static function makePagination($filters) {
            require("database.php");
            $sql = Glasses::makeSQL($filters);
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
        }
    }
    
?>