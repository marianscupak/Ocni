<main class="container">
    <div class="mainPanel">
        <h1>O NÁS</h1>
        <div class="mainSection">
            <h2>Vybavení</h2>
            <p>
                Nadstandardně vybavená oční ambulance s kompletním zázemím oční kliniky OneDayClinic. Kromě obvyklého vybavení disponujeme například optickým koherenčním tomografem (OCT) nebo přístrojem Pentacam k analýze rohovky a předního segmentu oka.
            </p>
            <h2>Operace</h2>
            <p>
                V případě potřeby Vás připravíme k operaci šedého zákalu, vše vysvětlíme a domluvíme. Operaci můžete absolvovat v klinice Lexum nebo na jiném pracovišti dle Vašeho výběru. Podobně vypadá postup, uvažujete-li o refrakční operaci, standardních či nadstandardních nitroočních čočkách.
            </p>
            <h2>Důležité</h2>
            <p>
                Nemáme smlouvu se zdravotní pojišťovnou. Pacientovi se věnujeme podle jeho potřeby a našeho přesvědčení s dostatkem času.
            </p>
            <h2>Ordinační doba</h2>
                <?php
                    $times = Times::get();
                    if (!empty($times)) {
                        foreach ($times as $time) {
                            echo '<p>' . Times::translate($time->day) . ' ' . substr($time->time_from, 0, -3) . ' - ' . substr($time->time_to, 0 , -3) . '</p>';
                        }
                        echo '<p>Pouze pro objednané.</p>';
                    }
                    else {
                        echo 'Středa 9.00 – 14.00 pouze pro objednané';
                    }
                ?>
                
        </div>
    </div>
</main>