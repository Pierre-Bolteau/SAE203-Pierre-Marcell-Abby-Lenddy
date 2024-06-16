<?php
$couleur_bulle_classe = "orange";
$page_active = "equipe-de-redaction";

require_once('./ressources/includes/connexion-bdd.php');

// Vos requêtes SQL
$requete_brute = "SELECT * FROM auteur";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);

$page_courante = "equipe-de-redaction";
$racine_URL = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de Redaction - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/equipe-de-redaction.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="shortcut icon" href="ressources/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="ressources/images/favicon.ico" type="image/x-icon">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Page Equipe de rédaction">
    <meta property="og:url" content="https://sae203tp1.alwaysdata.net/SAE-203-Pierre-Abby-Marcell-Lenddy/SAE203-Pierre-Marcell-Abby-Lenddy/code/Equipe-de-redaction.php">
    <meta property="og:image" content="https://images.radio-canada.ca/q_auto,w_960/v1/ici-premiere/16x9/extraterrestre-martiens-aliens-petits-hommes-verts-science-fiction-legende.jpg">
    <meta property="og:description" content="Découvrez la DreamTeam ;v">
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php require_once('./ressources/includes/bulle.php'); ?>
    <?php
    // facultatif
    // require_once('./ressources/includes/bulle.php'); 
    ?>
    

    <main class="conteneur-principal conteneur-1280 flex row justify-center">
        <!-- Vous allez principalement écrire votre code HTML dans cette balise -->
        <div class="bg-slate-300 rounded-lg px-8 py-8 max-h-65 mr-20 ml-20">
            <h1 class="text-6xl font-bold pb-8">Notre equipe</h1>
            <h2 class="text-2xl pb-3">Bienvenue à l'IUT CY Cergy Paris Universiter Site de Sarcelle!</h2>
            <p class="pb-3">Nous sommes ravis de vous présenter l'équipe dynamique et dévouée qui fait de notre institut un lieu d'excellence académique et d'innovation. 
            Voici un aperçu des membres clés de notre équipe :</p>
            <img src="https://media.licdn.com/dms/image/sync/D4E27AQElqPc1o28pqg/articleshare-shrink_800/0/1706529463229?e=2147483647&v=beta&t=Q1qxiflrkVMCPtQJL0-nkH6iKUSp5VBdfrjQuyz3uVA" alt="">
            <h2 class="text-2xl pb-3">Support Technique et Logistique</h2>
            <h3 class="font-bold">Graphiste : BOLTEAU Pierre</h3>
            <p class="pb-3"> Notre graphiste, Pierre, est responsable de la création visuelle et de l'identité graphique de l'IUT. Avec une maîtrise des outils de design et un sens aigu de l'esthétique, Pierre crée des supports visuels attrayants pour nos événements, nos publications et notre site web, renforçant ainsi l'image de marque de l'institut.
            </p>
            <h3 class="font-bold">Vidéaste : ANISCA-SEME Lenddy</h3>
            <p class="pb-3"> Le vidéaste, Lenddy, capture et produit des contenus vidéo de haute qualité pour l'IUT. Que ce soit pour des événements, des cours en ligne ou des projets spéciaux, Lenddy apporte une expertise technique et créative qui enrichit notre communication visuelle et notre présence numérique.
            </p>
            <h3 class="font-bold">Développeur : BANOL MORENO Marcell</h3>
            <p class="pb-3"> Notre développeur, Marcell, joue un rôle crucial en concevant, développant et maintenant les applications et les systèmes informatiques de l'IUT. Grâce à une expertise en [langages de programmation, par exemple Python, Java, etc.], [Nom] travaille en étroite collaboration avec les enseignants et les étudiants pour créer des solutions innovantes et adaptées aux besoins pédagogiques. Sa capacité à résoudre les problèmes techniques et à améliorer les fonctionnalités existantes est essentielle pour le bon fonctionnement de nos plateformes éducatives et administratives.
            </p>
            <h3 class="font-bold">Rédactrice : BAUD-NAZEBI Abby</h3>
            <p class="pb-3">Notre rédactrice, Abby, est en charge de la rédaction et de l'édition de contenus pour nos divers canaux de communication. Que ce soit pour le site web, les newsletters ou les publications officielles, Abby assure une communication claire, concise et engageante qui reflète les valeurs et les objectifs de l'IUT.
            </p>
            <p>Chaque membre de notre équipe contribue à faire de l'IUT CY Cergy Paris Universiter Site de Sarcelle un lieu d'apprentissage exceptionnel où les étudiants peuvent s'épanouir et se préparer efficacement à leurs futures carrières.</p>
            <p> Nous sommes fiers de notre personnel dévoué et de notre engagement envers l'excellence académique.</p>
            <p>Nous vous souhaitons une expérience enrichissante à l'IUT CY Cergy Paris Universiter Site de Sarcelle !</p>

        </div>
        <div class="mr-20">
            <div class="py-6">
                <table class="w-full">
                    <thead class="">
                    </thead>
                    <tbody>
                        <?php while ($element = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC)) {
                            $lien_edition = "{$racine_URL}/edition.php?id={$element['id']}"; ?>
                            <tr class="">
                                <div>
                                <td class=" flex justify-center ">
                                    <div class="object-contain h-50 w-96 pb-3">
                                        <img 
                                            class="w-full h-full"
                                            src='<?php echo $element['lien_avatar']; ?>' 
                                            loading="lazy"
                                            width='80' 
                                            height='80' 
                                            alt='<?php echo "Portrait {$element['prenom']}"; ?>' 
                                        />
                                    </div>
                                </td>
                                <td class="flex justify-start font-bold text-2xl"><?php echo $element['prenom']; ?></td>
                                <td class="flex justify-start font-bold text-3xl"><?php echo $element['nom']; ?></td>
                                <td class="flex justify-center pb-8">
                                <a href="<?php echo $element['lien_twitter']; ?>" target="_blank">Contacter</a>
                                </td>
                                <td class=""></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>