<form method="POST" class="container flex justify-center items-center h-screen" enctype="multipart/form-data">
    <div class="w-[50%] shadow-2xl border border-slate-200 p-3 rounded-md">
        <div class="field">
            <label class="label">Nom</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" name="nom" placeholder="Text input" required
                pattern="[A-Za-z]{2,30}"
                value="<?php if(isset($nom)) {echo $nom;} ?>"

                >
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Prenom</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" name="prenom" placeholder="Text input" required
                pattern="[A-Za-z]{2,30}"
                value="<?php if(isset($prenom)) {echo $prenom;} ?>"

                >
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                </span>
            </div>
        </div>

        <?php
        echo '<input class="hidden" type="text" name="verif" value="">';

        ?>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input id="mail" class="input is-info" type="email" name="email" placeholder="Email input" required
                pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                value="<?php if(isset($email)) {echo $email;} ?>"

                >
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
            </div>
            <div id="mailStatus"></div>
        </div>

        <div class="field">
            <label class="label">Mot de passe</label>
            <p class="control has-icons-left">
                <input id="password" class="input is-danger" type="password" name="password" placeholder="Password" required
                pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                value="<?php if(isset($password)) {echo $password;} ?>"

                >
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
            </p>
            <div id="passwordStatus"></div>
            <script>
                const password = document.getElementById("password");
                const status = document.getElementById('passwordStatus');
                const mail = document.getElementById("mail");
                const xhr_object = new XMLHttpRequest(); 

                password.addEventListener('input', event => {
                    const data = password.value;
                    const valueLength = event.target.value.length;
                    if(valueLength > 3) {
                        xhr_object.open("GET", `./src/controller/check.php?password=${data}`, true); 
                        xhr_object.send();
                    } else {
                        password.className = "input is-danger"
                    }
                });

                xhr_object.onload = function(e) {
                    const message = xhr_object.response; 

                    if(message == "ok") {
                        status.innerHTML = "<p class='help is-success'>Nice password !</p>"
                        password.className = "input is-success"
                    } else {
                        status.innerHTML = `<p class='help is-danger'>Need ${message}</p>`
                        password.className = "input is-warning"
                    }
                }             

            </script>
            
        </div>

        <div class="w-full flex">
            <div class="field w-[50%]">
                <label class="label">Favorite club</label>
                <p class="control has-icons-left">
                    <span class="select">
                        <select name="club" required>
                            <option selected disabled>Club</option>
                            <?php
                            foreach ($clubs as $key => $value) {
                                echo "<option value='".$value->getIdClub()."'>". $value->getNomClub() . '</option>';
                            }
                            
                            ?>
                        </select>
                    </span>
                    <span class="icon is-small is-left">
                        <i class="fas fa-globe"></i>
                    </span>
                </p>
            </div>

            <div class="w-[50%] flex flex-col justify-self-end">
                <label class="label">Photo de profil (optionnel)</label>
                <div class="file is-info">
                    <label class="file-label">
                        <input class="file-input" type="file" name="photo" accept=".png, .jpg, .jpeg">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a file…
                            </span>
                        </span>
                    </label>
                </div>
            </div>
        </div>

        <div class="w-[50%] flex flex-col">
            <label class="label">Sexe</label>
            <div class="control">
                <label class="radio">
                    <input type="radio" name="sexe" value="H" required>
                    Homme
                </label>
                <label class="radio">
                    <input type="radio" name="sexe" value="F" required>
                    Femme
                </label>
            </div>
        </div>

        <div class="field mt-5 border-top border-slate-200">
            <p class="control">
                <input type="submit" name="submit" class="button is-success">
            </p>
        </div>

        <div class="field mt-5 border-top border-slate-200">
        </div>
        <div <?php echo $status->main; ?>>
            <span <?php echo $status->style; ?> >
                <?php echo $status->statusMessage; ?>
            </span>
            <span class="icon is-small is-left">
                <i class="fas fa-exclamation-triangle text-slate-800"></i>
            </span>
        </div>
    </div>
</form>

