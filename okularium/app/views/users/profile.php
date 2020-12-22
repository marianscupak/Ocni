<main class="container">
    <div class="mainSection">
        <h1><?= $data['user']->name . ' ' . $data['user']->surname ?></h1>
        <h2>Informace</h2>
        <div class="profileInfo">
            <div>
                <h3>Jméno</h3>
                <div class="value"><?= $data['user']->name ?></div>
                <h3>Příjmení</h3>
                <div class="value"><?= $data['user']->surname ?></div>
                <h3>E-mail</h3>
                <div class="value"><?= $data['user']->email ?><button class="niceButton changeButton" onclick="changeForm(0);">Změnit</button></div>
                <h3>Heslo</h3>
                <button class="niceButton changeButton" onclick="changeForm(1);">Změnit</button>
            </div>
            <form action="/Ocni/okularium/public/uzivatel/update" method="post" id="changeForm">
                <input type="email" placeholder="Nový E-mail" id="email" name="email">
                <div id="pwd">
                    <input type="password" placeholder="Staré heslo" name="pwd_o">
                    <input type="password" placeholder="Nové heslo" name="pwd_n">
                </div>
                <input type="submit" value="Změnit">
                <input type="hidden" value="<?= $data['user']->email ?>" name="original">
            </form> 
        </div>
    </div>
</main>
<script src="/Ocni/okularium/public/js/profile.js"></script>