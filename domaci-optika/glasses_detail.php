<?php
    $title = "Domácí optika";
    require_once("header.php");
    require_once("scripts/glasses.php");    

    $glasses = Glasses::findGlasses($_GET['id']);
?>
<main class="container">
    <div class="mainSection">
        <h1 class="bigHeader"><?php echo $glasses->name ?></h1>
        <div class="gallery">
            <div class="gallerySlideWrap">
                <div class="galleryPrevious"><img src="assets/img/arrow.png" alt="Předchozí" onclick="changeSlide(-1)"></div>
                <?php
                    for ($i = 1; $i <= $glasses->imgCount; $i++) {
                        echo '<img id="slide_' . $i . '" class="gallerySlide';
                        if ($i == 1) {
                            echo " activeSlide";
                        }
                        echo '" src="assets/img/glasses/glasses_' . $glasses->id . '_' . $i . '.jpg" alt="Brýle">';
                    }
                ?>
                <div class="galleryNext"><img src="assets/img/arrow.png" alt="Následující" onclick="changeSlide(1)"></div>
            </div>
            <div class="galleryThumbnailsWrap">
                <?php
                    for ($i = 1; $i <= $glasses->imgCount; $i++) {
                    echo '<div class="galleryThumbnail">
                            <img id="thumbnail_' . $i . '" ';
                            if ($i == 1) {
                                echo ' class="activeThumbnail"';
                            }
                            echo ' src="assets/img/glasses/glasses_' . $glasses->id . '_' . $i . '.jpg" alt="Brýle" onclick="currentSlide(' . $i . ')">
                           </div>';
                    }
                ?>                
            </div>
        </div>
        <div class="contactUs">
            <h1 class="bigHeader">Cena: <?php echo number_format($glasses->price, 0, ',', ' '); ?> Kč</h1>
            <h1 class="darkHeader" id="interest">Zaujaly Vás tyto brýle?</h1>
            <h2>Domluvte si schůzku online!</h2>
            <!-- TODO: complete the form -->
            <form action="scripts/contact.php" method="post" class="contactForm">
                <label for="name">Jméno <span class="required">*</span></label>
                <input type="text" name="name" required>
                <label for="surname">Příjmení <span class="required">*</span></label>
                <input type="text" name="surname" required>
                <label for="email">E-mail <span class="required">*</span></label>
                <input type="email" name="email" required>
                <label for="phone">Telefon <span class="required">*</span></label>
                <input type="text" name="phone" pattern="^(\+420)? ?[1-9][0-9]{2} ?[0-9]{3} ?[0-9]{3}$" required>
                <label for="street">Ulice a č.p. <span class="required">*</span></label>
                <input type="text" name="street" required>
                <label for="city">Obec <span class="required">*</span></label>
                <input type="text" name="city" required>
                <label for="psc">PSČ <span class="required">*</span></label>
                <input type="text" name="psc" pattern="\d{3} ?\d{2}" required>
                <label for="msg">Zpráva</label>
                <textarea placeholder="Dobrý den, zaujaly mě tyto brýle. Rád bych se domluvil na schůzce." name="msg"></textarea>
                <input type="submit" name="submit" value="Odeslat">
                <input type="hidden" value=<?php echo '"' . $glasses->id . '"'; ?> name="id">
            </form>
            <p id="contact">Nebo nás <a href="contacts.php" class="link">kontaktujte zde</a>.</p>
        </div>
    </div>
</main>
<script src="assets/js/gallery.js"></script>
<?php
    require_once("footer.php");
?>