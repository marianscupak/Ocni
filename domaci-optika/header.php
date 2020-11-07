<!DOCTYPE HTML>
<html lang="cs">
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/main_style.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/eshop.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Raleway&family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo_glasses.png">
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- TODO: SEO 
    <meta name="description" content="Domácí optika"> 
    -->
    <title><?php echo $title; ?></title>
</head>
<body>
    <header>
        <div class="headerLogo">
            <a href="index.php">
                <img src="assets/img/logo_optika.png" alt="Domácí optika">
            </a>
        </div>
        <button onclick="responsiveMenu();" class="menuImg"><img src="assets/img/menu.png" alt="menu"></button>
        <div class="stickyHeader-hide stickyHeader">
            <a href="index.php"><img src="assets/img/logo_optika.png" alt="Domácí optika" class="stickyImg"></a>
            <nav class="navigation">
                <ul>
                    <li><a href="index.php">Domů</a></li>
                    <li class="dropdownHeader" onclick="dropdownMenu(0);"><a>Ceník<img src="assets/img/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="price_list.php">Ceník obrub a čoček</a></li>
                            <li><a href="price.php">Transparentní ceny</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdownHeader" onclick="dropdownMenu(1);"><a>Brýle<img src="assets/img/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="glasses.php?gender=m&p=1">Pánské</a></li>
                            <li><a href="glasses.php?gender=f&p=1">Dámské</a></li>
                        </ul>
                    </li>
                    <li class="dropdownHeader" onclick="dropdownMenu(2);"><a>O nás<img src="assets/img/arrow.png" alt="Šipka" class="navArrow"></a>
                        <ul>
                            <li><a href="how_it_works.php">Jak to funguje</a></li>
                            <li><a href="contacts.php">Kontakt</a></li>
                        </ul>
                    </li>
                    <li><a href="clinic.php">Klinika</a></li>
                </ul>
            </nav>
        </div>
    </header>