<?php
ob_start();
?>

<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">A propos</h1>
            <p class="lead fw-normal text-white-50 mb-0">Boutique en ligne spécialisée dans
                les produits pour la prévention de la COVID-19</p>
        </div>
    </div>
</header>

<!-- Section-->
<section class="py-4">
    <div class="container px-4 px-lg-5">
        <p class="mb-4"><a href="accueil">Accueil</a> > A Propos</p>
        <h2>Introduction</h2>
        <p>Le but de cet exercice est de créer un catalogue simplifié de produits et son module d’administration.<br>
            <b>Vous avez 3 journées pour réaliser ce projet.</b>
        </p>
        <h2>Tâches à remplir</h2>

        </br>

        <h3>_Front Office</h3>
        <p>La partie publique de l’application doit présenter une liste de produits en lien avec la prévention de
            la COVID-19 (i.e. le Coronavirus) : lingettes, masques chirurgicaux, visières, solutions
            hydroalcooliques, distributeurs, etc.</p>
        <p><b>La présentation de cette liste est à votre discrétion, toutefois chaque produit doit afficher les
                informations suivantes :</b></p>
        <ul>
            <li>Le nom du produit.</li>
            <li>Le prix du produit.</li>
            <li>Une illustration du produit (elle n’a pas besoin d’être conforme au produit).</li>
            <li>Un lien permettant d’accéder à la fiche détaillée du produit.</li>
        </ul>
        <p><b>Un sélecteur est également présent en début de liste permettant d’effectuer un tri :</b></p>
        <ul>
            <li>Par prix : du plus cher au moins cher, ou du moins cher au plus cher.</li>
            <li>Par nom : par ordre alphabétique ascendant ou descendant.</li>
        </ul>
        <p>Le sélecteur présente les quatre options : il n’est pas demandé de pouvoir trier la liste à la fois par prix et par nom.</p>
        <p><b>La fiche détaillée d’un produit affiche les informations suivantes :</b></p>
        <ul>
            <li>Le nom du produit.</li>
            <li>La description du produit.</li>
            <li>L’illustration du produit.</li>
            <li>Une mention indiquant si le produit est en stock ou épuisé.</li>
            <li>Une mention optionnelle indiquant si le produit est en promotion.</li>
            <li>Un lien permettant de revenir à la liste des produits.</li>
        </ul>

        </br>

        <h3>_Back Office</h3>
        <p>La partie privée de l’application doit présenter la même liste de produits, et permettre d’ajouter un
            nouveau produit ou de modifier un produit existant.</p>
        <p><b>L’accès au module d’administration n’est pas soumis à une authentification :</b><br>
            il n’est pas nécessaire d’implémenter un formulaire de connexion ou tout autre mécanisme
            d’identification de l’utilisateur.</p>
        <p><b>La présentation de la liste des produits est une vue simplifiée du Front Office.</b> La présentation de
            cette liste est à votre discrétion, elle doit toutefois afficher les éléments suivants :
        </p>
        <ul>
            <li>Le nom du produit.</li>
            <li>Un lien permettant d’accéder au formulaire d’édition du produit.</li>
        </ul>
        <p><b>Un sélecteur est également présent en début de liste.</b> Il permet d’effectuer un tri par ordre alphabétique ascendant ou descendant des noms de produits.</p>
        <p><b>Un bouton est affiché afin de permettre d’accéder au formulaire de création d’un nouveau produit.</b></p>
        <p><b>Le formulaire de création / modification d’un produit présente les champs suivants :</b></p>
        <ul>
            <li>Le nom du produit.</li>
            <li>La description du produit.</li>
            <li>Le prix.</li>
            <li>La quantité du produit en stock : c’est cette donnée qui conditionne l’affichage de la mention
                « en stock / épuisé » sur la fiche détaillée du produit dans le Front Office.</li>
            <li>Une case à cocher « en promotion » : c’est cette donnée qui conditionne l’affichage
                optionnel de la mention correspondante sur la fiche détaillée du produit dans le Front Office.</li>
        </ul>
        <p><b>Il n’est pas demandé d’implémenter le téléchargement des illustrations des produits.</b></p>

        </br>

        <h3>_Choix de l’architecture et des technologies</h3>
        <p><b>Vous êtes libres d’utiliser les technologies que vous souhaitez. </b>Aucune contrainte ne vous est
            imposée de ce côté.</p>
        <p><b>Vous pouvez utiliser le ou les langages de programmation de votre choix. </b>Gardez toutefois à l’esprit
            que chez ######## nous utilisons essentiellement JavaScript et PHP.</p>
        <p>Vous pouvez proposer votre travail dans un autre langage (C#, Dart, Java…) mais veuillez prendre
            contact au préalable avec le responsable développement (cf. rubrique « Contact » en fin de
            document). Nous ignorons tout de technologies telles Go, Python ou Ruby !</p>
        <p><b>Vous pouvez utiliser le support de votre choix pour la persistance des données : </b>fichier sur le disque
            dur (JSON, YAML…), base de données SQL (MariaDB/MySQL, PostgreSQL, SQL Server…) ou base de
            données NoSQL (CouchDB, MongoDB…).</br>
            Chez ######## nous utilisons uniquement SQL Server et MariaDB/MySQL : contactez-nous au préalable
            si vous souhaitez utiliser un autre système de base de données.</p>
        <p><b>Vous pouvez baser votre travail sur des bibliothèques et « frameworks » existants, ou choisir de
                tout coder par vous-même. </b>Utilisez ce avec quoi vous êtes le plus à l’aise : ne tentez pas d’utiliser
            une technologie que vous ne maîtrisez pas dans le but de nous impressionner ou parce que « c’est
            tendance ».</p>
        <p>A titre informatif :</p>
        <ul>
            <li>Pour les « anciennes » applications, nous utilisons PHP 5, basé sur du code propriétaire.</li>
            <li>Pour les « nouvelles » applications, nous utilisons JavaScript et PHP 8, basé sur les
                bibliothèques <b>Lit </b>(https://lit.dev) et <b>Slim Framework </b>(https://www.slimframework.com).</li>
        </ul>

        </br>

        <h3>_Résolution de l’exercice</h3>
        <p><b>Une fois votre travail achevé, vous devrez mettre son code source à notre disposition :</b></p>
        <ul>
            <li>Soit publié en ligne sur une plate-forme d’hébergement et librement accessible : GitHub, GitLab, Bitbucket, etc. N’oubliez pas de fournir le lien du projet.
            </li>
            <li>Soit envoyé par courrier électronique à l’adresse ######@######.com sous la forme d’une archive compressée (i.e. fichier ZIP).</li>
        </ul>
        <p><b>Le code source doit contenir tout le nécessaire à sa compréhension et à l’exécution de l’application :</b></p>
        <ul>
            <li>Si vous utilisez une base de données SQL, n’oubliez pas de joindre le script SQL permettant
                de la répliquer.</li>
            <li>Si l’application nécessite une phase de construction (compilation du code, ou autre tâche
                nécessaire au déploiement final sur un serveur), veuillez documenter ce processus de
                construction.
            </li>
            <li>Toute autre instruction écrite que vous pourriez juger nécessaire.</li>
        </ul>
        <p><b>Vous devrez également présenter l’application en conditions réelles :</b></p>
        <ul>
            <li>Soit publiée en ligne sur une plate-forme d’hébergement et librement accessible. N’oubliez
                pas de fournir le lien du site.
            </li>
            <li>Si l’application nécessite une phase de construction (compilation du code, ou autre tâche
                nécessaire au déploiement final sur un serveur), veuillez documenter ce processus de
                construction.
            </li>
            <li>Soit le code source de l’application fournit une documentation avec des instructions
                détaillées pour construire et déployer l’application sur l’un de nos postes de travail, en
                particulier si l’application utilise une technologie que nous ne supportons pas (cf. ci-dessous).
            </li>
        </ul>
        <p><b>A titre informatif, nos serveurs et postes de travail sont équipés des technologies suivantes :</b></p>
        <ul>
            <li>Système d’exploitation : CentOS Linux 6, 7 et 8, Windows Server 2000 et 2019</li>
            <li>Serveur Web : Apache 2.2 et 2.4, Microsoft IIS 10.0</li>
            <li>Serveur de base de données : MySQL 5.1, MariaDB 10.8, SQL Server 2000 et 2019</li>
            <li>Node.js 11.15, 17.9 et 18.8</li>
            <li>PHP 5.3, 5.4, 5.6 et 8.1
            </li>
        </ul>

        </br>

        <h3>_Conseils</h3>
        <p><b>Allez à l’essentiel !</b> Trois jours pour réaliser cet exercice, c’est court. Si vous n’avez pas le temps
            d’implémenter toutes les fonctionnalités, concentrez-vous sur ce qui vous semble le plus important.
            Il vaut mieux un projet inachevé mais fonctionnel qu’une « usine à gaz » qui ne fonctionne pas.</p>
        <p>Ne sacrifiez pas votre temps libre : une journée de travail dure 7 heures. Vous être libres d’y
            consacrer plus (ou moins !) de temps, mais gardez à l’esprit que ce qui va être jugé est la globalité du
            projet plus que les détails.</p>
        <p><b>Finaliser l’application n’est pas une fin en soi, c’est la manière dont vous l’architecturez et la
                qualité de votre code qui importent dans cet exercice. </b>Il ne nous reste plus qu’à vous souhaiter bon
            courage !</p>
    </div>
</section>

<?php
$content = ob_get_clean();
require __DIR__."/template.php";
?>
