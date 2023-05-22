<div class="w-full h-screen">
    <div class="w-full h-screen bg-flower bg-no-repeat bg-cover bg-center opacity-70 absolute"></div>
    <div class="flex justify-center">
        <section class="w-[60%] h-full absolute z-index-10">
            <div class="p-5 bg-white shadow-2xl shadow-slate-800 w-full">
            <div class="pt-20 mb-10 flex justify-between items-center">
                <h1 class="text-3xl font-bold">Articles</h1>
                <a href="/articles/new" class="text-xl bg-sky-600 hover:bg-sky-700 text-slate-100 rounded p-2">Ecrire un article</a>
            </div>
            <?php
                if ($articles == null) {
                    echo "Aucun article enregistré";
                } else {
                    foreach ($articles as $key => $article) {
                        include('./src/views/articles/template_article.php');
                    }
                }

                ?>
            </div>
        </section>
    </div>
</div>