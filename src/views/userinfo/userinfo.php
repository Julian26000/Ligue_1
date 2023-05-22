<div class="flex w-full">
  <section class="w-[20%] h-screen pt-10 bg-slate-200 overflow-auto z-10">
    <div class="flex flex-col border-b-2 border-slate-800 justify-center items-center py-5">
      <h2 class="font-bold text-xl py-5">
        <p class="<?php echo colorByAccess($user) ?>">
          <?php
          if ($isFirstTime) {
            echo "Bienvenue ";
          } else
            echo "Bonjour ";
          echo $user->getNomUti()

            ?>
        </p>
      </h2>
      <div class="rounded-full border-2 border-slate-800 flex justify-center align-center">
        <img class="rounded-full w-60 h-60 object-cover bg-center" src="<?php echo $user->getImageUti(); ?>"
          alt="photo de profil">
      </div>
    </div>
    <div class="flex flex-col justify-center items-center font-bold">
      <?php
      $admin = $user->isAdminUti();
      if ($admin)
        include('./src/views/userinfo/admin_menu.php');
      ?>
      <div class="w-[70%] my-5">
        <h1 class="mb-5 text-xl">Gestion du compte</h1>
        <ul class="flex flex-col text-md space-y-4 border-l-2 border-blue-600 pl-5">
          <a class="" onclick="window.location.href = '/profile'">Profil</a>
          <a class="" onclick="window.location.href = '/profile/parametres'">Parametres</a>
          <a class="" onclick="window.location.href = '/profile/contact'">Nous contacter</a>
        </ul>
      </div>
    </div>
  </section>
  <section class="w-[80%] h-screen pt-10 right-0 bg-slate-300">
    <?php
    $request_uri = $_SERVER['REQUEST_URI'];

    if (isset($request_uri)) {
      $route = preg_split('[/]', $request_uri);
      if (isset($route[2])) {
        switch ($route[2]) {
          case 'parametres':
            include('./src/views/userinfo/menu_compte/parametres.php');
            break;
          case "contact":
            include('./src/views/userinfo/menu_compte/contact.php');
            break;
        }
        return;
      }
      include('./src/views/userinfo/menu_compte/profil.php');
    }

    ?>
  </section>
</div>