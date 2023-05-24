<?php $link = "/articles/". $article->getId_article(); ?>

<a class="w-full bg-slate-200 rounded-lg flex border-2 border-slate-700 mb-5 hover:bg-slate-300 cursor-pointer" href=<?php echo $link ?>>
    <section class="w-[70%] max-h-40 p-2">
        <div class="flex flex-cols place-content-between">
            <div class="w-[70%]">
                <h2 class="text-xl font-bold"><?php echo $article->getTitre_article() ?></h2>
                <p><?php echo $article->getContent_article() ?></p>
            </div>
            <img class="rounded max-h-32" src=<?php echo $article->getImage_article() ?> alt="">
        </div>
    </section>
    <section class="flex items-center border-l-2 border-slate-700 pl-2">
        <div class="flex flex-col justify-center">
            <h2>Auteur : <?php echo $userController->get_user_byid($article->getId_uti())->getNomUti() ?> </h2>
        </div>
    </section>
</a>