<main class="container">
    <div class="mainSection">
        <h1>Seznam pacientů</h1>
        <table class="priceTable">
            <thead>
            <tr>
                <th>Jméno</th>
                <th>Příjmení</th>
                <th>E-mail</th>
                <th>Profil</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    if (!empty($data['patients'])) {
                        foreach ($data['patients'] as $patient) {
                            echo '<tr>
                                    <td>' . $patient->name . '</td>
                                    <td>' . $patient->surname . '</td>
                                    <td>' . $patient->email . '</td>
                                    <td><a href="/Ocni/okularium/public/uzivatel/' . $patient->email . '" class="link">Profil</a>
                                </tr>';

                        }
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</main>