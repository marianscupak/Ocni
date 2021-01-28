<main class="container">
    <div class="mainSection">
        <h1>Objednat prohlídku</h1>
        <div class="profileInfo">
            <div>
                <div class="field">
                    <h2>Datum</h2>
                    <input id="datePicker">
                </div>
                <div class="field">
                    <h2>Důvod</h2>
                    <textarea id="reason"></textarea>
                </div>
                <?php
                    if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                        echo '<div class="field">
                                <h2>Pacient</h2>';
                                echo '<select id="user">';
                        foreach ($data['patients'] as $patient) {
                            echo '<option value="' . $patient->id_user . '">' . $patient->name . ' ' . $patient->surname . '</option>';
                        }
                        
                        echo '</select></div>';
                    }
                    else {
                        echo '<input type="hidden" value="' . $_SESSION['id_user'] . '" id="user">';
                    }
                ?>
                
                <div>
                    <button onclick="process();" class="niceButton" id="submitButton">Objednat</button>
                </div>
            </div>
            <div id="timeSelection">
                <h2>Čas</h2>
            </div>
        </div>
    </div>
</main>
<script src="/Ocni/okularium/public/js/flatpickr.js"></script>
<script src="/Ocni/okularium/public/js/flatpickr_settings.js"></script>