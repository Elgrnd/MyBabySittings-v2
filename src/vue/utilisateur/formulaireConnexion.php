<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="form-container">
        <h2 class="text-center mb-4">Connexion</h2>
        <form method=<?php if (\App\MyBabySittings\Configuration\ConfigurationSite::getDebug()) echo "get"; else echo "post" ?> action="controleurFrontal.php">
            <div class="mb-3">
                <label class="form-label">Login <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" placeholder="Votre login" name="login" id="login" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="password" class="form-control" name="mdp" id="mdp" required>
                </div>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="remember" id="remember">
                <label class="form-label">Se souvenir de moi ?</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Se connecter <i class="bi bi-send"></i></button>
            </div>
        </form>
    </div>
</div>
