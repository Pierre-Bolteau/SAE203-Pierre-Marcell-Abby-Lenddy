<?php
require_once('../../ressources/includes/connexion-bdd.php');

$page_courante = "articles";

$formulaire_soumis = !empty($_POST);

if ($formulaire_soumis) {
    if (!empty($_POST["titre"]) && !empty($_POST["chapo"]) && !empty($_POST["contenu"]) && !empty($_POST["image"])){
        $titre = htmlentities($_POST["titre"]);
        $chapo = htmlentities($_POST["chapo"]);
        $contenu = htmlentities($_POST["contenu"]);
        $image = htmlentities($_POST["image"]);

        // On récupère la date du jour
        $date = new DateTimeImmutable();

        // La date est formattée en chaîne de caractères
        // au format Année-mois-jour Heure:minutes:secondes
        // Sinon, elle ne pourra pas être 
        // insérée dans la base de données
        $date_formatte = $date->format('Y-m-d H:i:s');
    
        // On prépare notre requête pour créer une nouvelle entité
        $requete_brute = "
        INSERT INTO article(titre, chapo, contenu, image) 
        VALUES ('$titre', '$chapo', '$contenu', '$image')
        ";
        
        // On crée une nouvelle entrée
        $resultat_brut = mysqli_query($mysqli_link, $requete_brute);

        if ($resultat_brut === true) {
            // Tout s'est bien passé
            // Tout s'est bien passé
            // L'utilisateur retourne à la liste des éléments.
            $racineURL = pathinfo($_SERVER['REQUEST_URI']);
            $pageRedirection = $racineURL['dirname'];
            header("Location: $pageRedirection");
        } else {
            // Il y a eu un problème
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Creation A-REMPLACER - Administration</title>
</head>

<body>
    <?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Créer</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="py-6">
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre"  id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="titre">
                        </div>
                        <div class="col-span-12">
                            <label  for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label  for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                            <textarea type="text" name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu"></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="image" class="block text-lg font-medium text-gray-700">Lien image</label>
                            <input type="text" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="image">
                            <div class="text-sm text-gray-500">
                                Mettre l'URL de l'image (chemin absolu)
                            </div>
                        </div>
                        <div class="col-span-12">
                            <label for="lien_yt" class="block text-lg font-medium text-gray-700">Lien Youtube</label>
                            <input type="text" name="lien_ytb" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_yt">
                            <div class="text-sm text-gray-500">
                                Mettre l'URL de la vidéo
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Créer</button>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>