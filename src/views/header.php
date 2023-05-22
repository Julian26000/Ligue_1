<div class="w-full fixed overflow-hidden z-20">
  <div class="h-1 w-full bg-blue-600"></div>
  <nav class="navbar is-dark text-md h-[7%]">
    <div class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="/">
          Acceuil
        </a>
        <a class="navbar-item" href="/classement">
          Classement
        </a>
        <a class="navbar-item" href="/articles">
          Articles
        </a>
      </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          <p class="control">

            <?php
            if (isset($_SESSION['UserInfo'])) {
              include('./src/views/header_c.php');
            } else {
              include('./src/views/header_d.php');
            }
            ?>

        </div>
      </div>
    </div>
</div>
</nav>
</div>