<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Boucherie Jonis</title>
        <link rel="stylesheet" href="style/style.css" />
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
                <a href="controller.php"><img src="logo/logo_jonis.png" alt="logo" class="logo" id="logo-header" /></a>
            </div>
            <div id="navbar">
                <ul>
                    <li><a href="boutique.html" id="bp">NOS BONS PLANS</a></li>
                    <li><a href="boutique.html">BOUCHERIE</a></li>
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
                    <a href="panier.html"><img src="icons/panier.svg" alt="basket" width="50px" height="50px" /></a>
                    <a href="panier.html">Mon Panier</a>
                </div>
                <div>
                    <a href="profil.html"><img src="icons/utilisateur.svg" alt="user" width="50px" height="50px" /></a>
                    <a href="profil.html">Mon Compte</a>
                </div>
            </section>
        </header>
        <main>
            <div id="blank"></div>
            <div id="contain-search-bar">
                <div id="search-bar">
                    <form action="controller_result.php" method="post" autocomplete="off">
                        <input id="search" type="text" placeholder="Rechercher..." onKeyUp="showResults(this.value)" name="search" />
                        <button type="submit" name="submit"><img src="icons/loupe.svg" width="30px" height="30px" alt="" /></button>
                    </form>
                </div>
            </div>