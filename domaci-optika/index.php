<?php
    $title = "Domácí optika";
    require_once("header.php");
?>
<main class="container">
    <div class="mainPanel">
        <div class="slideshow">
            <img src="assets/img/slideshow_dummy_1.jpg" alt="Brýle">
            <img src="assets/img/slideshow_dummy_2.jpg" alt="Brýle">
            <img src="assets/img/slideshow_dummy_3.jpg" alt="Brýle">
        </div>
        <h1>PRO KVALITNÍ BRÝLE JIŽ NEMUSÍTE ANI VYJÍT Z DOMU</h1>
        <div class="perks">
            <div class="perk">
            <a href="glasses.php" class="link"><img src="assets/img/icon_glasses.png" alt="Ikona"></a>
                <p>Nové brýle můžete získat v kamenné optice nebo v <a href="glasses.php?p=1" class="link">e-shopu</a>.</p>
            </div>
            <div class="perk">
                <img src="assets/img/icon_house.png" alt="Ikona">
                <p>Návštěvu optika si můžete objednat třeba k Vám domů. Nové brýle si vyzkoušíte v pohodlí domova. S výběrem nejvhodnějších brýlí Vám odborně poradíme.</p>
            </div>
            <div class="perk">
                <img src="assets/img/icon_money.png" alt="Ikona">
                <p><a href="index.php" class="link">Domácí optika</a></b> spojuje individuální přístup kamenné optiky s internetovými cenami. Díky nám získáte exkluzivní ceny.</p>
            </div>
            <div class="perk">
                <a href="contacts.php"><img src="assets/img/icon_contact.png" alt="Ikona"></a>
                <p>Nic neriskujte. Neváhejte nás <a href="contacts.php" class="link">kontaktovat</a> a domluvte si návštěvu.</p>
            </div>
            <div class="perk">
                <a href="glasses.php"><img src="assets/img/icon_product.png" alt="Ikona"></a>
                <p><a href="glasses.php?p=1" class="link">Zde</a> můžete nahlédnout do naší nabídky brýlových obrub.</p>
            </div>
        </div>
    </div>
</main>
<script src="assets/js/slideshow.js"></script>
<?php
    require_once("footer.php");
?>