<main class="container">
    <div class="mainSection">
        <h1>Ordinační hodiny</h1>
        <div class="profileInfo marginBottom">
            <form method="post" action="/Ocni/okularium/public/ordinacni_hodiny/update" id="form">
                <?php
                    foreach ($data['days'] as $day) {
                        echo '<div class="day">
                            <div class="value">
                                <h2>Den</h2>';
                                echo '<select name="days[]">';
                                    for ($i = 1; $i <= 7; $i++) {
                                        echo '<option value=' . $i . (($i == $day->day)? ' selected' : '') . '>' . Times::translate($i) . '</option>';
                                    }
                                echo '</select>
                            </div>';
                            echo '<div class="value">
                                <h2>Od</h2> <input type="time" value="' . $day->time_from . '" name="times_from[]">
                            </div>';
                            echo '<div class="value">
                                <h2>Do</h2> <input type="time" value="' . $day->time_to . '" name="times_to[]">
                            </div>
                            <input type="button" onclick="removeElement(this);" class="niceButton deleteButton" value="Odstranit">
                        </div>';
                    }
                ?>
                <input type="submit" value="Uložit" class="niceButton" id="submit">
            </form>
        </div>
        <button class="niceButton" onclick="addElement();">Přidat den</button>
    </div>
</main>
<div class="day" id="template">
    <div class="value">
        <h2>Den</h2>
        <select name="days[]">
        <?php
            for ($i = 1; $i <= 7; $i++) {
                echo '<option value=' . $i . (($i == 1)? ' selected' : '') . '>' . Times::translate($i) . '</option>';
            }
        ?>
        </select>
    </div>
    <div class="value">
        <h2>Od</h2> <input type="time" value="07:00:00" name="times_from[]">
    </div>
    <div class="value">
        <h2>Do</h2> <input type="time" value="10:00:00" name="times_to[]">
    </div>
    <input type="button" onclick="removeElement(this);" class="niceButton deleteButton" value="Odstranit">
</div>
<script src="/Ocni/okularium/public/js/edit.js"></script>