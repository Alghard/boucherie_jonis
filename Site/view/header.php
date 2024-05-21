<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Boucherie Jonis</title>
        <link rel="stylesheet" href="../public/style/style.css" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div id="burger">
                <button>
                    <div class="toggle">
                        <span class="dot"></span>
                        <span class="line"></span>
                        <span class="dot"></span>
                        <span class="line"></span>
                        <span class="dot"></span>
                        <span class="line"></span>
                    </div>
                </button>
            </div>
            <div id="container-logo-header">
                <a href="index.php"><img src="../public/logo/logo_jonis.png" alt="logo" class="logo" id="logo-header" /></a>
            </div>
            <div id="navbar">
                <ul>
                    <li><a href="boutique.html" id="bp">NOS BONS PLANS</a></li>
                    <li><a href="controller_result.php?id=3">BOUCHERIE</a></li>
                    <li><a href="boutique.html">CHARCUTERIE</a></li>
                    <li><a href="boutique.html">TRAITEUR</a></li>
                    <li><a href="recette.html">RECETTES</a></li>
                    <li><a href="blog.html">BLOG</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    <li><a href="contact.html">CONTACT</a></li>
                </ul>
            </div>
            <section>
                <div>
                    <a href="panier.html" class="header-icons"><img src="../public/icons/panier.svg" alt="basket" /></a>
                    <a href="panier.html" class="header-txt">Mon Panier</a>
                </div>
                <div>
                    <a href="profil.html" class="header-icons"><img src="../public/icons/utilisateur.svg" alt="user"/></a>
                    <a href="profil.html" class="header-txt">Mon Compte</a>
                </div>
            </section>
        </header>
        <main>
            <div id="blank"></div>
            <div id="contain-search-bar">
                <div id="search-bar">
                    <form action="controller_result.php" method="post" autocomplete="off">
                        <input id="search" type="text" placeholder="Rechercher..." onKeyUp="showResults(this.value)" name="search" />
                        <button type="submit" name="submit"><img src="../public/icons/loupe.svg" alt="" id="ico-loupe" /></button>
                    </form>
                </div>
            </div>