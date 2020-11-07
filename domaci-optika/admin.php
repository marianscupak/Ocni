<?php
    $title = "Domácí optika";
    require_once("header.php");
?>
<main style="margin: 10px 5%;">
    <h1 class="fancyHeader">Administrace</h1>
    <h2>Přidat brýle</h2>
    <div class="filters">
        <form action="scripts/admin.php" method="post" enctype="multipart/form-data" class="contactForm" style="margin-left: 0; width: 130%">
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
            require("scripts/Glasses.php");
            $glasses = Glasses::loadGlasses(NULL, 0);
        
            foreach ($glasses as $_glasses) {
                 echo '
                    <div class="glassesContainer" style="width: 10%;">
                        <a href="glasses_detail.php?id=' . $_glasses->id . '" class="imageContainer">
                            <img src="assets/img/glasses/glasses_' . $_glasses->id . '_1.jpg" alt="Brýle">
                        </a>
                        <a href="glasses_detail.php?id=' . $_glasses->id . '" class="glassesName"><h2>' . $_glasses->name . '</h2></a>
                        <h3>' . number_format($_glasses->price, 0, ',', ' ') . ' Kč</h3>
                        <div class="glassesDelete"><a href="scripts/admin.php?del=' . $_glasses->id . '">Smazat</a></div>
                    </div>
                ';            
            }               
        ?>
    </div>
    <div id="message"></div>
    <img src="assets/img/close.png" id="messageClose" onclick=hideMess()>
    <script>
        $(document).ready(function() {
            var mess = "<?php            
                if (isset($_GET['add'])) {
                    if ($_GET['add'] == 1) {
                        echo 'Brýle úspěšně přidány.';
                        $color = "green";
                    }
                }
                if (isset($_GET['del'])) {
                    if ($_GET['del'] == 1) {
                        echo 'Brýle úspěšně vymazány.';
                        $color = "red";
                    }
                }
            ?>";

            if (mess != "") {
                $("#message").css({"display": "block", "background-color": <?php echo '"' . $color . '"'?>});
                $("#messageClose").css({"display": "block"});
                $("#message").html(mess);
                setTimeout(hideMess, 3500);
            }
        });
        function hideMess() {
            $("#message").fadeOut(500);
            $("#messageClose").fadeOut(500);
        };
    </script>
</main>