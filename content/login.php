<title><?php echo "Accedi - RegUni" ?></title>
<div class="container">
    <h2>Accedi</h2>
    <hr>
    <div class="row align-items-start justify-content-center">
        <div class="pt-4 col-lg-5">
            <form>
                <div class="mb-3">
                    <label for="badgeNumber" class="form-label">Numero Badge</label>
                    <input type="text" class="form-control" id="badgeNumber">
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="userPassword" aria-describedby="passwordHelp">
                    <div id="passwordHelp" class="form-text">Se hai dimenticato la password contatta l'amministratore di sistema.</div>
                </div>
                <button type="submit" class="btn btn-dark">Accedi</button>
            </form>
        </div>
    </div>
</div>