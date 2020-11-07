<?php
    $title = "Domácí optika";
    require_once("header.php");
    require_once("scripts/glasses.php");

    if (isset($_GET)) {
        $filters = $_GET;
        if (isset($filters['order'])) {
            if ($filters['order'] != 'priceAsc' && $filters['order'] != 'priceDesc' && $filters['order'] != 'dateDesc' && $filters['order'] != 'dateAsc' && $filters['order'] != "") {
                $filters['order'] = "";
            }
        }        
        if (isset($filters['gender'])) {
            if ($filters['gender'] != 'm' && $filters['gender'] != 'f' && $filters['gender'] != 'u' && $filters['gender'] != "") {
                $filters['gender'] = "";
            }
        }        
    }
    else {
        $filters = NULL;
    }
    if (empty($_GET['p'])) {
        $filters['p'] = 1;
    }
    $glasses = Glasses::loadGlasses($filters, 1);
    $limits = Glasses::findLimits($glasses);
?>
<main class="container">
    <div class="eshopContainer">
        <div class="filters">
            <h2>Filtrovat</h2>
            <form method="get" action="glasses.php?">
                <label for="order">Seřadit od:</label>
                <select name="order" class="filterSelect">
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
                <select name="gender" class="filterSelect">
                    <option value="" 
                        <?php
                            if (empty($_GET['gender'])) {
                                echo ' selected';
                            }
                        ?>
                    ></option>
                    <option value="m"
                        <?php 
                            if (!empty($_GET['gender'])) {
                                if ($_GET['gender'] == 'm') {
                                    echo ' selected';
                                }
                            }
                        ?>
                    >Muž</option>
                    <option value="f"
                        <?php 
                            if (!empty($_GET['gender'])) {
                                if ($_GET['gender'] == 'f') {
                                    echo ' selected';
                                }
                            }
                        ?>
                    >Žena</option>
                    <option value="u" 
                        <?php
                            if (!empty($_GET['gender'])) {
                                if ($_GET['gender'] == 'u') {
                                    echo ' selected';
                                }
                            }                             
                        ?>
                    >Neutrální</option>
                </select>
                <label for="priceFrom">Cena od:</label>
                <input type="number" name="priceFrom" value=
                <?php
                    if (!empty($_GET['priceFrom'])) {
                        echo '"' . $_GET['priceFrom'] . '"';
                    }
                    else {
                        echo '"' . $limits["lowest"] . '"'; 
                    }
                ?> min="0">
                <label for="priceTo">Cena do:</label>
                <input type="number" name="priceTo" value=
                <?php
                    if (!empty($_GET['priceTo'])) {
                        echo '"' . $_GET['priceTo'] . '"';
                    }
                    else {
                        echo '"' . $limits["highest"] . '"'; 
                    }
                ?> min="0">
                <input type="submit" name="submit" value="Filtrovat" class="filterSubmit">
            </form>
        </div>
        <div class="eshopWidth">
            <h1 class="fancyHeader">Nabídka obrub</h1>
            <div class="eshop">
                <?php
                    if (count($glasses) > 0) {
                        foreach ($glasses as $_glasses) {
                            $_glasses->display();
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
                Glasses::makePagination($filters);
            ?>
        </ul>
    </div>
</main>
<?php
    require_once("footer.php");
?>