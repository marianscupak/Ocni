<main class="container">
    <div class="mainSection">
        <h1>Ordinační hodiny</h1>
        <div class="profileInfo">
            <form method="post" action="/Ocni/okularium/public/ordinacni_hodiny/update">
                <?php
                    $days = Times::get();
                    foreach ($days as $day) {
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
                        </div>';
                    }
                ?>
            </form>
        </div>
    </div>
</main>