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
                <?php
                    if ($data['user']->id_user == $_SESSION['id_user']) {
                ?>
                    <h3>Heslo</h3>
                    <button class="niceButton changeButton" onclick="changeForm(1);">Změnit</button>
                <?php
                    }
                ?>
                <?php
                    if (!empty($_SESSION)) {
                        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                            echo '<br /><br /><a class="niceButton changeButton" href="/Ocni/okularium/public/uzivatel/delete/' . $data['user']->id_user . '">Odebrat pacienta</a>';
                        }
                    }
                ?>
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
        <h2>Prohlídky</h2>
        <?php 
            if (count($data['exams']['future']) + count($data['exams']['past']) > 0) {
                echo '<table class="priceTable">
                    <thead id="examTableHead">
                        <tr>
                            <th>Datum</th>
                            <th>Čas</th>
                            <th>Důvod</th>
                            ';
                            if (!empty($_SESSION)) {
                                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                                    echo '<th>Zrušit</th>';
                                }
                            }
                        echo '</tr>
                    </thead>
                    <tbody>
                    ';
                if (count($data['exams']['future']) > 0) {
                    echo '<tr>
                            <td colspan="4">Nadcházející prohlídky</td>
                        </tr>';
                    
                    foreach ($data['exams']['future'] as $exam) {
                        echo '<tr>
                            <td>' . DateTime::createFromFormat('Y-m-d', $exam->date)->format('j.n.Y') . '</td>
                            <td>' . substr($exam->time, 0, -3) . '</td>
                            <td>' . $exam->reason . '</td>';
                            if (!empty($_SESSION)) {
                                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                                    echo '<td><a href="/Ocni/okularium/public/prohlidky/delete/?date=' . $exam->date . '&time=' . substr($exam->time, 0, -3) . '" class="link">Zrušit</a></td>';
                                }
                            }
                        echo '</tr>';
                    }
                }
                if (count($data['exams']['past']) > 0) {
                    echo '<tr>
                            <td colspan="4">Minulé prohlídky</td>
                        </tr>';
                    
                    foreach ($data['exams']['past'] as $exam) {
                        echo '<tr>
                                <td>' . date_format(date_create_from_format('Y-m-d', $exam->date), 'j.n.Y') . '</td>
                                <td>' . substr($exam->time, 0, -3) . '</td>
                                <td>' . $exam->reason . '</td>';
                                if (!empty($_SESSION)) {
                                    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                                        echo '<td><a href="/Ocni/okularium/public/prohlidky/delete/?date=' . $exam->date . '&time=' . substr($exam->time, 0, -3) . '" class="link">Zrušit</a></td>';
                                    }
                                }
                            echo '</tr>';
                    }
                }
                echo '</tbody>
                    </table>';
            }
            else {
                echo 'Tento pacient nemá žádné prohlídky.';
            }
        ?>
    </div>
</main>
<script src="/Ocni/okularium/public/js/profile.js"></script>