<!DOCTYPE HTML>
<html lang="cs">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/main_style.css">
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo SHARED_RES_PREFIX; ?>/css/eshop.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo DO_RES_PREFIX; ?>/images/logo_glasses.png">
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TODO: SEO 
    <meta name="description" content="Domácí optika"> 
    -->
    <title><?= $data['title'] ?></title>
</head>
<body>
    <header>
        <div class="headerLogo">
            <a href="<?php echo LINK_PREFIX; ?>/">
                <img src="<?php echo DO_RES_PREFIX; ?>/images/logo_optika.png" alt="Domácí optika">
            </a>
        </div>
        <button onclick="responsiveMenu();" class="menuImg"><img src="<?php echo DO_RES_PREFIX; ?>/images/menu.png" alt="menu"></button>
        <div class="stickyHeader-hide stickyHeader">
            <a href="<?php echo LINK_PREFIX; ?>/"><img src="<?php echo DO_RES_PREFIX; ?>/images/logo_optika.png" alt="Domácí optika" class="stickyImg"></a>
            <nav class="navigation">
                <ul>
                    <li><a href="<?php echo LINK_PREFIX; ?>/">Domů</a></li>
                    <li class="dropdownHeader" onclick="dropdownMenu(0);"><a>Ceník<img src="<?php echo DO_RES_PREFIX; ?>/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="<?php echo LINK_PREFIX; ?>/cenik">Ceník obrub a čoček</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/transparentni_ceny">Transparentní ceny</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdownHeader" onclick="dropdownMenu(1);"><a>Brýle<img src="<?php echo DO_RES_PREFIX; ?>/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="<?php echo LINK_PREFIX; ?>/bryle/m">Pánské</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/bryle/f">Dámské</a></li>
                        </ul>
                    </li>
                    <li class="dropdownHeader" onclick="dropdownMenu(2);"><a>O nás<img src="<?php echo DO_RES_PREFIX; ?>/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="<?php echo LINK_PREFIX; ?>/jak_to_funguje">Jak to funguje</a></li>
                            <li><a href="<?php echo LINK_PREFIX; ?>/kontakty">Kontakt</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo OK_LINK_PREFIX; ?>/">Klinika</a></li>
                </ul>
            </nav>
        </div>
    </header>
