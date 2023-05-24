<?php

if (!isset($_SESSION['UserInfo'])) {
    header("Location: /login");
}

$status = (object) ['main' => 'hidden', 'statusMessage' => '', 'style' => ''];

if (isset($_POST['newarticle'])) {
               
	$title = $_REQUEST['title'];
	$content = $_REQUEST['content'];
	$autor = $_SESSION['UserInfo']->id;
	$image = $_FILES['image']['name'];

	define('PATH', './assets/articles/');    // Repertoire cible

	if(isset($image) and !empty($image)){
		$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
		$extension  = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		$temp_name = $_FILES['image']['tmp_name'];

		if(in_array(strtolower($extension),$tabExt)){
			$nomImage = md5(uniqid()) .'.'. $extension;
			$image = PATH.$nomImage;

		} 
	} else $image = PATH."defaultuser.png";

	$newArticle = new Article(0, $title, $content, $autor, $image);
	$status = $articleController->newArticle($newArticle);
    move_uploaded_file($temp_name, $image);
    header('Location: /articles');

	
}


?>

<div class="h-screen w-full flex justify-center items-center">
    <form method="POST" class="w-full flex justify-center items-center" enctype="multipart/form-data">
        <div class="w-[80%] shadow-2xl border border-slate-200 p-3 rounded-md space-y-5">
            <h1 class="text-2xl font-bold">Rédaction d'un article</h1>
            <div>
                <div class="field">
                    <label class="label">Titre</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-success placeholder:text-slate-200" type="text" name="title"
                            placeholder="Titre" required pattern="[A-Za-z]{2,30}"
                            value="<?php if (isset($nom)) {
                                echo $nom;
                            } ?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-text"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Contenu</label>
                    <textarea class="textarea is-primary text-start" name="content" pattern="[A-Za-z]{2,30}"
                        required></textarea>

                </div>
            </div>
            <div class="w-[50%] flex flex-col justify-self-end">
                <label class="label">Image</label>
                <div class="file is-info">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image" accept=".png, .jpg, .jpeg">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choisir un fichier
                            </span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="field mt-5 border-top border-slate-200">
                <p class="control">
                    <input type="submit" name="newarticle" class="button is-success">
                </p>
            </div>

            <div class="field mt-5 border-top border-slate-200">
            </div>
            <div <?php echo $status->main; ?>>
                <span <?php echo $status->style; ?>>
                    <?php echo $status->statusMessage; ?>
                </span>
            </div>
        </div>
    </form>

</div>