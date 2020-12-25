<main class="container">
    <div class="mainSection">
        <h2>Prohlídky</h2>
        <?php 
            if (!empty($data['exams'])) {
                echo '<table class="priceTable">
                        <thead id="examTableHead">
                            <tr>
                                <th>Pacient</th>
                                <th>Datum</th>
                                <th>Čas</th>
                                <th>Důvod</th>
                            </tr>
                        </thead>
                        <tbody>
                        ';
                if (count($data['exams']['future']) > 0) {
                    echo '<tr>
                            <td colspan="4">Nadcházející prohlídky</td>
                        </tr>';
                    
                    foreach ($data['exams']['future'] as $exam) {
                        echo '<tr>
                                <td>' . $exam->user->name . ' ' . $exam->user->surname .'</td>
                                <td>' . $exam->date . '</td>
                                <td>' . $exam->time . '</td>
                                <td>' . $exam->reason . '</td>
                            </tr>';
                    }
                }
                if (count($data['exams']['past']) > 0) {
                    echo '<tr>
                            <td colspan="4">Minulé prohlídky</td>
                        </tr>';
                    
                    foreach ($data['exams']['past'] as $exam) {
                        echo '<tr>
                                <td>' . $exam->user->name . ' ' . $exam->user->surname .'</td>
                                <td>' . $exam->date . '</td>
                                <td>' . $exam->time . '</td>
                                <td>' . $exam->reason . '</td>
                            </tr>';
                    }
                }
                echo '</tbody>
                    </table>';
            }
            else {
                echo 'Nemáte žádné prohlídky.';
            }
        ?>
    </div>
</main>