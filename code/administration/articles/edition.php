<?php
require_once '../../ressources/includes/connexion-bdd.php';

$page_courante = "articles";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists('id', $_GET);

$entite = null;
if ($entree_mise_a_jour) {
    $id = $_GET["id"];
    // On cherche l'article à éditer
    $requete_brute = "SELECT * FROM article WHERE id = $id";
    $resultat_brut = mysqli_query($mysqli_link, $requete_brute);
    $entite = mysqli_fetch_array($resultat_brut, MYSQLI_ASSOC);
}

if ($formulaire_soumis) {
    $id = $_POST["id"];
    $titre = htmlentities($_POST["titre"]);
    $chapo = htmlentities($_POST["chapo"]);
    $contenu = htmlentities($_POST["contenu"]);
    $image = htmlentities($_POST["image"]);
    $ytb = htmlentities($_POST["lien_yt"]);
    // On crée notre requête pour éditer une entité
    $requete_brute = "
        UPDATE article
        SET 
            titre = '$titre',
            chapo = '$chapo',
            contenu = '$contenu',
            lien_yt = '$ytb'
        WHERE id = '$id'
    ";
    // On met à jour l'élément
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
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Editer l'article - Administration</title>
</head>

<body>
<?php include_once '../ressources/includes/menu-principal.php'; ?>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">Editer</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="py-6">
            <?php if ($entite) { ?>
                <form method="POST" action="" class="rounded-lg bg-white p-4 shadow border-gray-300 border-1">
                    <section class="grid gap-6">
                        <input type="hidden" value="<?php echo $entite['id'];?>" name="id">
                        <div class="col-span-12">
                            <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                            <input type="text" name="titre"  value="<?php echo $entite['titre']; ?>"  id="titre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="col-span-12">
                            <label for="chapo" class="block text-lg font-medium text-gray-700">Chapô</label>
                            <textarea type="text" name="chapo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="chapo"><?php echo $entite['chapo']; ?></textarea>
                        </div>
                        <div class="col-span-12">
                            <label for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
                            <textarea type="text" name="contenu" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="contenu"><?php echo $entite['contenu']; ?></textarea>
                        </div>
                        <div class="col-span-12">
                                <label for="image" class="block text-lg font-medium text-gray-700">Lien image</label>
                                <input type="text" value="<?php echo $entite['image']?>" name="image" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="image">
                            </div>
                            <div class="col-span-12">
                                <label for="lien_yt" class="block text-lg font-medium text-gray-700">Lien Youtube</label>
                                <input type="text" value="<?php echo $entite['lien_yt']?>" name="lien_yt" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lien_yt">
                            </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="rounded-md bg-indigo-600 py-2 px-4 text-lg font-medium text-white shadow-sm hover:bg-indigo-700">Éditer</button>
        </div>
    </section>
                        </div>
                    </section>
                </form>
            <?php } ?>
            </div>
        </div>
    </main>
    <?php require_once("../ressources/includes/global-footer.php"); ?>
</body>

</html>