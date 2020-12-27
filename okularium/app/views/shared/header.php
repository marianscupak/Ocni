<!DOCTYPE HTML>
<html lang="cs">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Ocni/shared_resources/css/header.css">
    <link rel="stylesheet" href="/Ocni/shared_resources/css/main_style.css">
    <link rel="stylesheet" href="/Ocni/shared_resources/css/footer.css">
    <link rel="stylesheet" href="/Ocni/shared_resources/css/eshop.css">
    <link rel="stylesheet" href="/Ocni/okularium/public/css/colors.css">
    <link rel="stylesheet" href="/Ocni/okularium/public/css/main_style.css">
    <link rel="stylesheet" href="/Ocni/okularium/public/css/flatpickr.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/Ocni/okularium/public/images/icon.png">
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
            <a href="/Ocni/okularium/public">
                <img src="/Ocni/okularium/public/images/logo_klinika.png" alt="Okularium">
            </a>
        </div>
        <button onclick="responsiveMenu();" class="menuImg"><img src="/Ocni/domaci-optika/public/images/menu.png" alt="menu"></button>
        <div class="stickyHeader-hide stickyHeader">
            <a href="/Ocni/okularium/public"><img src="/Ocni/okularium/public/images/logo_klinika.png" alt="Domácí optika" class="stickyImg"></a>
            <nav class="navigation">
                <ul>
                    <li><a href="/Ocni/okularium/public/">Domů</a></li>
                    <li class="dropdownHeader" onclick="dropdownMenu(0);"><a>O nás<img src="/Ocni/domaci-optika/public/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="/Ocni/domaci-optika/public/jak_to_funguje">Jak to funguje</a></li>
                            <li><a href="/Ocni/domaci-optika/public/kontakty">Kontakt</a></li>
                        </ul>
                    </li>
                    <?php
                        if (!empty($_SESSION)) {
                            if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor') {
                                ?>
                    <li class="dropdownHeader" onclick="dropdownMenu(1);"><a>Administrace<img src="/Ocni/domaci-optika/public/images/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="/Ocni/okularium/public/pacienti">Pacienti</a></li>
                            <li><a href="/Ocni/okularium/public/pacienti/pridat">Přidat pacienta</a></li>
                            <li><a href="/Ocni/okularium/public/prohlidky">Prohlídky</a></li>
                            <li><a href="/Ocni/okularium/public/prohlidky/pridat">Objednat prohlídku</a></li>
                        </ul>
                    </li>
                    <?php
                            }
                        }
                    ?>
                    <li><a href="/Ocni/domaci-optika/public/">Optika</a></li>
                    <?php
                        if (empty($_SESSION)) {
                            echo '<li><a onclick="loginForm();">Přihlásit se</a></li>';
                        }
                        else {
                            echo '<li><a href="/Ocni/okularium/public/uzivatel/">Profil</a></li>';
                            echo '<li><a href="/Ocni/okularium/public/uzivatel/logout">Odhlásit se</a></li>';
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
