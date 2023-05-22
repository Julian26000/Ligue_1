<form method="POST" action="/login" class="container flex justify-center items-center h-[80%]">
    <div class="w-[30%] shadow-2xl border border-slate-200 p-3 rounded-md">
    <h2 class="label border-b pb-3 text-center">Connexion
    </h2>
    <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-info" type="text" name="email" placeholder="Email input" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="field">
            <label class="label">Mod de passe</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-info" type="password" name="password" placeholder="Password input" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                </span>
        </div>
        <div class="field mt-5 border-top border-slate-200">
            <p class="control">
                <input type="submit" name="submit" class="button is-success">
                
            </p>
        </div>
        <div <?php echo $mainClass; ?>>
            <span <?php echo $class ?> >
                <?php echo $statusMessage; ?>
            </span>
            <span class="icon is-small is-left">
                <i class="fas fa-exclamation-triangle text-slate-800"></i>
            </span>
        </div>
    </div>
</form>

