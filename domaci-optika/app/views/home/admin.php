<main style="margin: 10px 5%;">
    <h1 class="fancyHeader">Administrace</h1>
    <h2>Přidat brýle</h2>
    <div class="filters">
        <form action="<?php echo LINK_PREFIX; ?>/admin/add/" method="post" enctype="multipart/form-data" class="contactForm" style="margin-left: 0; width: 130%">
            <label for="name">Název:</label>
            <input type="text" name="name" required>
            <label for="price">Cena:</label>
            <input type="text" name="price" required>
            <label for="gender">Pohlaví:</label>
            <select name="gender" class="filterSelect">
                <option value="m">Muž</option>
                <option value="f">Žena</option>
                <option value="u">Neutrální</option>
            </select>
            <label for="pics">Obrázky:</label>
            <input type="file" name="files[]" multiple>
            <input type="submit" value="Přidat" name="submitAdd">
        </form>
    </div>
    <h2>Odebrat brýle</h2>
    <div class="eshop" style="width: 100%">
        <?php
            $glasses = Glasses::select("*")->get();
        
            foreach ($glasses as $_glasses) {
                 echo '
                    <div class="glassesContainer" style="width: 10%;">
                        <a href="' . LINK_PREFIX . '/bryle/detail/' . $_glasses->id_glasses . '" class="imageContainer">
                            <img src="' . DO_RES_PREFIX . '/images/glasses/glasses_' . $_glasses->id_glasses . '_1.jpg" alt="Brýle">
                        </a>
                        <a href="' . LINK_PREFIX . '/bryle/detail/' . $_glasses->id_glasses . '" class="glassesName"><h2>' . $_glasses->name . '</h2></a>
                        <h3>' . number_format($_glasses->price, 0, ',', ' ') . ' Kč</h3>
                        <div class="glassesDelete"><a href="' . LINK_PREFIX . '/admin/del/' . $_glasses->id_glasses . '">Smazat</a></div>
                    </div>
                ';            
            }               
        ?>
    </div>
</main>