<div class="w-full h-full">
    <div class="w-full h-full bg-flower bg-no-repeat bg-cover bg-center opacity-70 absolute"></div>
    <div class="w-full h-full flex justify-center absolute z-10">
        <section class="w-[60%] h-full">
            <div class="pb-10 pt-5 bg-white shadow-2xl shadow-slate-800 px-5">
            <h1 class="text-3xl pt-20 font-bold mb-10">Classement saison</h1>

                <?php 

                if($saisons == null) {
                    echo "Aucune données de saison enregistrée";
                    return;
                };
                $rank = 0;
                foreach ($saisons as $key => $saison) {
                    $rank++;
                    include('./src/views/classement/template_resultat.php'); 
                }
                ?>
            </div>
        </section>
    </div>
</div>