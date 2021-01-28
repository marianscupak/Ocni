<main class="container">
    <div class="mainSection">
        <h1>Ceník</h1>
        <div class="profileInfo marginBottom">
            <form method="post" action="/Ocni/okularium/public/cenik/update" id="form" class="pricesForm">
                <?php
                    foreach ($data['prices'] as $price) {
                        echo '<div class="day">
                        <div class="value">
                            <h2>Název</h2>
                            <input type="text" name="names[]" value="' . $price->name . '">
                        </div>
                        <div class="value">
                            <h2>Cena</h2>
                            <input type="text" name="prices[]" value="' . $price->price . '">
                        </div>
                        <div class="value">
                            <h2>Poznámka</h2>
                            <textarea name="notes[]">' . ((!empty($price->note)) ? $price->note : '') . '</textarea>
                        </div>
                        <input type="button" onclick="removeElement(this);" class="niceButton deleteButton" value="Odstranit">
                    </div>';
                    }
                ?>
                <input type="submit" value="Uložit" class="niceButton" id="submit">
            </form>
        </div>
        <button class="niceButton" onclick="addElement();">Přidat cenu</button>
    </div>
</main>
<div class="day" id="template">
    <div class="value">
        <h2>Název</h2>
        <input type="text" name="names[]">
    </div>
    <div class="value">
        <h2>Cena</h2>
        <input type="text" name="prices[]">
    </div>
    <div class="value">
        <h2>Poznámka</h2>
        <input type="text" name="notes[]">
    </div>
    <input type="button" onclick="removeElement(this);" class="niceButton deleteButton" value="Odstranit">
</div>
<script src="/Ocni/okularium/public/js/edit.js"></script>