<main class="container">
    <div class="mainSection">
        <h1>Přidat pacienta</h1>
        <div class="profileInfo">
            <form method="post" action="/Ocni/okularium/public/uzivatel/add">
                <div class="field">
                    <h2>Jméno</h2>
                    <input type="text" name="name" required>
                </div>
                <div class="field">
                    <h2>Příjmení</h2>
                    <input type="text" name="surname" required>
                </div>
                <div class="field">
                    <h2>E-mail</h2>
                    <input type="email" name="email" required>
                </div>
                <?php
                    if ($_SESSION['role'] == 'admin') {
                        echo "<h2>Role</h2>";
                    }
                ?>
                <input type="<?php 
                    if ($_SESSION['role'] == 'admin') {
                        echo "text";
                    }
                    else {
                        echo "hidden";
                    }
                ?>" value="<?php
                if ($_SESSION['role'] == 'admin') {
                    echo "";
                }
                else {
                    echo "patient";
                }
                ?>" name="role" required>
                <div class="field">
                    <input type="submit" value="Přidat" class="niceButton">
                </div>
            </form>
        </div>
    </div>
</main>