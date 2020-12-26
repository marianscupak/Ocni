<h1>Vítejte v klinice Okularium <?= $data['user']->name . ' ' . $data['user']->surname ?>!</h1>
<h2>Vaše přihlašovací údaje:</h2>
<ul>
    <li>
        <b>Email:</b> <?= $data['user']->email ?>
    </li>
    <li>
        <b>Heslo:</b> <?= $data['password'] ?>
    </li>
</ul>
<p>Z bezpečnostních důvodů Vám doporučujeme si heslo co nejdříve změnit.</p>