<title><?php echo "Accedi - RegUni" ?></title>
<div class="container">
    <h2>Accedi</h2>
    <hr>
    <div class="row align-items-start justify-content-center">
        <div class="pt-4 col-lg-5">
            <?php
            if (isset($_COOKIE['status'])) {
                if ($_COOKIE['status'] == "error_missing_data") {
                    echo '<div class="alert alert-warning" role="alert">Compila tutti i campi!</div>';
                } elseif ($_COOKIE['status'] == "error_wrong_data") {
                    echo '<div class="alert alert-danger" role="alert">Numero badge o password errati!</div>';
                } elseif ($_COOKIE['status'] == "error_logged_out") {
                    echo '<div class="alert alert-warning" role="alert">La sessione è scaduta, accedi nuovamente per continuare:</div>';
                }
                setcookie("status", "", 0, "/");
            }
            ?>
            <form action="api/login.php" method="post">
                <input type="hidden" name="callback" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <div class="mb-3">
                    <label for="badgeNumber" class="form-label">Numero Badge</label>
                    <input type="text" class="form-control" name="badge" id="badgeNumber" value="<?php IF(isset($_COOKIE['badge'])) echo($_COOKIE['badge']) ?>">
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userPassword" name="password" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">Se hai dimenticato la password contatta l'amministratore di sistema.</div>
                </div>
                <button type="submit" class="btn btn-dark">Accedi</button>
            </form>
        </div>
    </div>
</div>