<!DOCTYPE HTML>
<html lang="cs">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Ocni/shared_resources/css/header.css">
    <link rel="stylesheet" href="/Ocni/shared_resources/css/main_style.css">
    <link rel="stylesheet" href="/Ocni/shared_resources/css/footer.css">
    <link rel="stylesheet" href="/Ocni/shared_resources/css/eshop.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/Ocni/domaci-optika/public/images/logo_glasses.png">
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
            <a href="/Ocni/domaci-optika/public">
                <img src="/Ocni/domaci-optika/public/images/logo_optika.png" alt="Domácí optika">
            </a>
        </div>
        <button onclick="responsiveMenu();" class="menuImg"><img src="/Ocni/domaci-optika/public/images/menu.png" alt="menu"></button>
        <div class="stickyHeader-hide stickyHeader">
            <a href="/Ocni/domaci-optika/public"><img src="/Ocni/domaci-optika/public/images/logo_optika.png" alt="Domácí optika" class="stickyImg"></a>
            <nav class="navigation">
                <ul>
                    <li><a href="/Ocni/domaci-optika/public/">Domů</a></li>
                    <li class="dropdownHeader" onclick="dropdownMenu(0);"><a>Ceník<img src="/Ocni/domaci-optika/public/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="/Ocni/domaci-optika/public/cenik">Ceník obrub a čoček</a></li>
                            <li><a href="/Ocni/domaci-optika/public/transparentni_ceny">Transparentní ceny</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdownHeader" onclick="dropdownMenu(1);"><a>Brýle<img src="/Ocni/domaci-optika/public/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="/Ocni/domaci-optika/public/bryle/m">Pánské</a></li>
                            <li><a href="/Ocni/domaci-optika/public/bryle/f">Dámské</a></li>
                        </ul>
                    </li>
                    <li class="dropdownHeader" onclick="dropdownMenu(2);"><a>O nás<img src="/Ocni/domaci-optika/public/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="/Ocni/domaci-optika/public/jak_to_funguje">Jak to funguje</a></li>
                            <li><a href="/Ocni/domaci-optika/public/kontakty">Kontakt</a></li>
                        </ul>
                    </li>
                    <li><a href="/Ocni/okularium/public/">Klinika</a></li>
                </ul>
            </nav>
        </div>
    </header>
