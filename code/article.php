<?php
$couleur_bulle_classe = "bleu";
$page_active = "index";

require_once('./ressources/includes/connexion-bdd.php');

// Code à améliorer
$id = $_GET["id"];
$requete_brute = "
    SELECT * FROM article 
    WHERE article.id = $id
";
$resultat_brut = mysqli_query($mysqli_link, $requete_brute);

$jointure_requete_brute = "
    SELECT * FROM article
    LEFT JOIN auteur 
    ON article.auteur_id = auteur.id;
";
$resultat_jointure_brut = mysqli_query($mysqli_link, $jointure_requete_brute);

// Fonction pour intégrer le lien YouTube
function integrerlien($lien) {
    $pattern = "/^https?:\/\/(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/";
    $replace = "https://www.youtube.com/embed/$1";
    return preg_replace($pattern, $replace, $lien);
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/<?php echo $_ENV['CHEMIN_BASE']; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article - SAÉ 203</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/fonts.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/accueil.css">

    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/article.css">
    <link rel="shortcut icon" href="ressources/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="ressources/images/favicon.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php require_once('./ressources/includes/top-navigation.php'); ?>
    <?php
    // A supprimer si vous n'en avez pas besoin.
    // Mettre une couleur dédiée pour cette bulle si vous gardez la bulle
    require_once('./ressources/includes/bulle.php');
    ?>

    <!-- Vous allez principalement écrire votre code HTML ci-dessous -->
    <main class="conteneur-principal conteneur-1280">
    <?php while ($article = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC)) {?>
        <div class="flex flex-row-reverse justify-between" >
            <div class = "">
                <img
                    class ="border-solid border-2 border-slate-200 rounded-md shadow-xl mr-6"
                    src='<?php echo $article['image']; ?>' 
                    loading="lazy"
                    width='500' 
                    height='500' 
                    alt='placeholder' 
                />
            </div>
            <div class="border-solid border-2 border-slate-200 rounded-md p-2 shadow-xl w-1/2 ml-6">
                <h1 class="titre"><?php echo $article['titre']; ?></h1>
                <p class="font-bold"><?php echo $article['chapo']; ?></p>
                <p><?php echo $article['contenu']; ?></p>
                <p><?php echo $article['date_creation']; ?></p>
            </div>
        </div>
        <?php if (!empty($article['lien_yt'])) {
            $lien_yt_iframe = integrerlien($article['lien_yt']);
        ?>
            <iframe width="100%" height="500" src="<?php echo $lien_yt_iframe; ?>" title="Video Youtube" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"></iframe>
            <p class="lien_ytb"><a href="<?php echo $article['lien_yt']; ?>" target="_blank">Lien Vidéo Youtube</a></p>
        <?php
            }
        ?>
    <?php } ?>
    
    <?php while ($auteur = mysqli_fetch_array($resultat_jointure_brut, MYSQLI_ASSOC)) {?>
        <ul class="flex flex-row space-x-1 ">
            <li><p><?php echo $auteur['prenom']; ?></p></li>
            <li><p><?php echo $auteur['nom']; ?></p></li>
        </ul>
    <?php } ?>
    
    </main>
    <?php require_once('./ressources/includes/footer.php'); ?>
</body>

</html>