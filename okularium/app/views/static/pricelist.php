<main class="container">
    <div class="mainPanel">
        <h1>CENÍK</h1>
        <div class="mainSection">
            <table class="priceTable marginBottom">
                <thead>
                    <tr>
                        <th>Vyšetření</th>
                        <th>Cena</th>
                        <th>Poznámka</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (count($data['prices']) > 0) {
                        foreach ($data['prices'] as $price) {
                            echo '<tr>
                                <td>' . $price->name . '</td>
                                <td>' . $price->price . '</td>
                                <td>' . ((isset($price->note)) ? $price->note : '') . '</td>
                            </tr>';
                            
                        }
                    }
                ?>
                </tbody>
            </table>
            <h2>Rozkapání zornic</h2>
            <p>Pro detailní vyšetření celé sítnice je nezbytné rozšířit zornice, neboli je "rozkapat". Pomocí očních kapek se rozšíří zornice na dobu asi 2-6 hodin. To u většiny lidí vede ke zhoršení vidění a zvýšenému oslnění sluncem. Člověk na tuto dobu ztrácí schopnost řídit auto, číst a ovládat některé stroje. Vyhraďte si proto dostatek času, kdy nemusíte řídit auto a pracovat. Děkujeme za pochopení.</p>
        </div>
    </div>
</main>