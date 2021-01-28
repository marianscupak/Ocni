<main class="container">
    <div class="eshopContainer">
        <div class="filters">
            <h2>Filtrovat</h2>
            <form method="get" action="">
                <label for="order">Seřadit od:</label>
                <select name="order" id="order" class="filterSelect">
                    <option value=""
                    <?php
                        if (empty($_GET['order'])) {
                            echo ' selected';
                        }
                    ?>
                    ></option>
                    <option value="priceAsc"
                        <?php
                            if (!empty($_GET['order'])) {
                                if ($_GET['order'] == 'priceAsc') {
                                    echo ' selected';
                                }                                
                            }
                        ?>
                    >Nejnižší ceny</option>
                    <option value="priceDesc"
                        <?php
                            if (!empty($_GET['order'])) {
                                if ($_GET['order'] == 'priceDesc') {
                                    echo ' selected';
                                }
                            }
                        ?>
                    >Nejvyšší ceny</option>
                    <option value="dateDesc"
                        <?php
                            if (!empty($_GET['order'])) {
                                if ($_GET['order'] == 'dateDesc') {
                                    echo ' selected';
                                }                                
                            }
                        ?>
                    >Nejnovějších</option>
                    <option value="dateAsc"
                        <?php
                            if (!empty($_GET['order'])) {
                                if ($_GET['order'] == 'dateAsc') {
                                    echo ' selected';
                                }                                
                            }
                        ?>
                    >Nejstarších</option>
                </select>
                <label for="gender">Pohlaví:</label>
                <select name="gender" id="gender" class="filterSelect">
                    <option value="" 
                        <?php
                            if (empty($data['gender'])) {
                                echo ' selected';
                            }
                        ?>
                    ></option>
                    <option value="m"
                        <?php 
                            if (!empty($data['gender'])) {
                                if ($data['gender'] == 'm') {
                                    echo ' selected';
                                }
                            }
                        ?>
                    >Muž</option>
                    <option value="f"
                        <?php 
                            if (!empty($data['gender'])) {
                                if ($data['gender'] == 'f') {
                                    echo ' selected';
                                }
                            }
                        ?>
                    >Žena</option>
                    <option value="u" 
                        <?php
                            if (!empty($data['gender'])) {
                                if ($data['gender'] == 'u') {
                                    echo ' selected';
                                }
                            }                             
                        ?>
                    >Neutrální</option>
                </select>
                <label for="priceFrom">Cena od:</label>
                <input type="number" name="priceFrom" id="priceFrom" value=
                <?php
                    if (!empty($_GET['priceFrom'])) {
                        echo '"' . $_GET['priceFrom'] . '"';
                    }
                    else {
                        echo '"' . $data['limits']['min'] . '"'; 
                    }
                ?> min="0">
                <label for="priceTo">Cena do:</label>
                <input type="number" name="priceTo" id="priceTo" value=
                <?php
                    if (!empty($_GET['priceTo'])) {
                        echo '"' . $_GET['priceTo'] . '"';
                    }
                    else {
                        echo '"' . $data['limits']['max'] . '"'; 
                    }
                ?> min="0">                
            </form>
            <button name="submit" id="submit" class="filterSubmit" onclick="proccessIntoURL();">Filtrovat</button>
        </div>
        <div class="eshopWidth">
            <h1 class="fancyHeader">Nabídka obrub</h1>
            <div class="eshop">
                <?php
                    if (count($data['glasses']) > 0) {
                        foreach ($data['glasses'] as $glasses) {
                            echo '
                                <div class="glassesContainer">
                                    <a href="/Ocni/domaci-optika/public/bryle/detail/' . $glasses->id_glasses . '" class="imageContainer">
                                        <img src="/Ocni/domaci-optika/public/images/glasses/glasses_' . $glasses->id_glasses . '_1.jpg" alt="Brýle">
                                    </a>
                                    <a href="/Ocni/domaci-optika/public/bryle/detail/' . $glasses->id_glasses . '" class="glassesName"><h2>' . $glasses->name . '</h2></a>
                                    <h3>' . number_format($glasses->price, 0, ',', ' ') . ' Kč</h3>
                                    <div class="glassesDetail"><a href="/Ocni/domaci-optika/public/bryle/detail/' . $glasses->id_glasses . '">Detail</a></div>
                                </div>
                            ';
                        }
                    }
                    else {
                        echo "Vašim požadavkům neodpovídají žádné brýle, zkuste upravit filtry.";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="pagination">
        <ul>
            <?php
                $url = $_SERVER['REQUEST_URI'];

                str_replace('detail/', '', $url);
                $exploded = explode("?", $url);
                $url_split['start'] = $exploded[0];
                
                $url_split['end'] = (!empty($exploded[1]))? $exploded[1] : '';                
                $pageCount = ceil($data['count'] / $data['per_page']);

                if (is_numeric($url_split['start'][strlen($url_split['start']) - 1])) {
                    $url_split['start'] = substr($url_split['start'], 0, -2);
                }                

                if ($url_split['start'][strlen($url_split['start']) - 1] == '/') {
                    $url_split['start'] = substr($url_split['start'], 0, -1);
                }

                if ($pageCount > 1) {
                    echo '<li><a href="';
                    if ($data['page'] > 1) {
                        echo $url_split['start'] . '/' . ($data['page'] - 1);
                        if (!empty($url_split['end'])) {
                            echo '?' . $url_split['end'];
                        } 
                    }
                    else {
                        echo '" class="disabledPagination';
                    }
                    echo '">Předchozí</a></li>';
                }

                for ($i = 1; $i <= $pageCount; $i++) {
                    echo '<li><a href="' . $url_split['start'] . '/' . $i;
                    if (!empty($url_split['end'])) {
                        echo '?' . $url_split['end'];
                    }
                    echo '"';
                    if ($i == $data['page']) {
                        echo ' class="activePage"';
                    }
                    echo '>' . $i . '</a></li>';
                }

                if ($pageCount > 1) {
                    echo '<li><a href="';
                    if ($data['page'] < $pageCount) {
                        echo $url_split['start'] . '/' . ($data['page'] + 1);
                        if (!empty($url_split['end'])) {
                            echo '?' . $url_split['end'];
                        }
                    }
                    else {
                        echo '" class="disabledPagination';
                    }
                    echo '">Následující</a></li>';
                }
            ?>
        </ul>
    </div>
</main>
<script src="/Ocni/shared_resources/js/form.js"></script>