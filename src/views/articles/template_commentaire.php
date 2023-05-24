<div class="w-full bg-slate-200 rounded-lg flex border-2 border-slate-700 mb-5">
    <section class="w-[70%] max-h-40 p-2">
        <div class="flex flex-cols place-content-between">
            <div class="w-[70%]">
                <h2 class="text-xl font-bold"><?php echo $commentaire->getText_commentaire() ?></h2>
            </div>
        </div>
    </section>
    <section class="flex items-center border-l-2 border-slate-700 pl-2">
        <div class="flex flex-col justify-center">
            <h2>Auteur : <?php echo $userController->get_user_byid($commentaire->getId_uti())->getNomUti() ?> </h2>
        </div>
    </section>
</div>