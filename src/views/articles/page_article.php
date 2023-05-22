<?php
$commentaires = $gestionCommentaire->getListCommentaire($article->getId_article());

$status = (object) ['main' => 'hidden', 'statusMessage' => '', 'style' => ''];

if (isset($_POST['commentaire'])) {

    if (!isset($_SESSION['UserInfo'])) {
        header("Location: /login");
    }

    $text_commentaire = $_REQUEST['text'];
    $id_article = $article->getId_article();
    $id_autor = $_SESSION['UserInfo']->id;

    $commentaire = new Commentaire(0, $text_commentaire, $id_article, $id_autor);
    $status = $gestionCommentaire->addCommentaire($commentaire);
    header("Location: /articles/". $article->getId_article());


}
?>

<div class="w-full h-full">
    <div class="w-full h-screen bg-flower bg-no-repeat bg-cover bg-center opacity-70 absolute"></div>
    <div class="flex justify-center">
        <section class="pt-20 w-[70%] h-full bg-white shadow-2xl shadow-slate-800 absolute z-index-10 space-y-10">
            <div class="px-5 space-y-5">
                <h1 class="pt-20 text-3xl font-bold">
                    <?php echo $article->getTitre_article() ?>
                </h1>
                <p class="border rounded p-2">
                    <?php echo $article->getContent_article() ?>
                </p>
            </div>
            <div class="px-5 border-t pt-5">
                <form method="POST">
                    <h2>Ajouter un commentaire</h2>
                    <input type="text" name="text" class="input is-info mt-5">
                    <button type="submit" name="commentaire" class="button is-success mt-5">Envoyer</button>
                </form>
                <p <?php $status->main ?> class="<?php $status->style ?>" >
                    <?php $status->statusMessage ?>
                </p>
            </div>
            <div class="px-5 border-t pt-5 h-full bg-white w-full space-y-5">
                <h1>Commentaires</h1>  
                <?php
                if ($commentaires == null) {
                    echo "Aucun commentaire enregistré";
                } else {
                    foreach ($commentaires as $key => $commentaire) {
                        include('./src/views/articles/template_commentaire.php');
                    }
                }
                ?>             
            </div>
        </section>
    </div>
</div>