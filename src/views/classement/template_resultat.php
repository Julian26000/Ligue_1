<a class="w-full bg-slate-200 rounded-lg flex border-2 border-slate-700 mb-5 hover:bg-slate-300 cursor-pointer">
    <section class="w-[70%] max-h-40 p-2">
        <div class="flex flex-cols place-content-between">
            <div class="w-[70%]">
                <h2 class="text-xl font-bold"> <?php echo $saison->getNomClub() ?></h2>
                <p>Rank: <?php echo $rank ?></p>
            </div>
        </div>
    </section>
    <section class="flex items-center border-l-2 border-slate-700 pl-2">
        <div class="flex flex-col justify-center">
            <p>But marqués <?php echo $saison->getNbButsMarques() ?></p>
            <p>But encaissés <?php echo $saison->getNbButsEncaisse() ?></p>
            <p>nb points <?php echo $saison->getNbPoints() ?></p>
        </div>
    </section>
</a>