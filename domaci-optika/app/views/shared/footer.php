<footer>
    <div class="footer-wrap">
        <div class="contacts">
            <ul>
                <li><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_location.png">Studénka a okolí</li>
                <li><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_contact.png">739 029 743</li>
                <li><img src="<?php echo DO_RES_PREFIX; ?>/images/icon_email.png">sylva.smehlikova@gmail.com</li>
            </ul>
        </div>
        <div class="copyright"><h2>© 2021 Všechna práva vyhrazena.</h2></div>
    </div>
</footer>
<div id="message">
    Web má pouze prezentační účel. 
    <?php            
        if (isset($_GET['add'])) {
            if ($_GET['add'] == 1) {
                echo 'Brýle úspěšně přidány.';
            }
        }
        if (isset($_GET['del'])) {
            if ($_GET['del'] == 1) {
                echo 'Brýle úspěšně vymazány.';
            }
        }
        if (isset($_GET['mail'])) {
            if ($_GET['mail'] == 1) {
                echo 'Zpráva odeslána.';
            }
        }
    ?>
</div>
<img src="<?php echo DO_RES_PREFIX; ?>/images/close.png" id="messageClose" onclick=hideMess()>
<script src="<?php echo SHARED_RES_PREFIX; ?>/js/message.js"></script>
<script src="<?php echo SHARED_RES_PREFIX; ?>/js/header.js"></script>
</body>
</html>