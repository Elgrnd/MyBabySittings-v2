<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="form-container">
        <h2 class="text-center mb-4">Créer un compte</h2>
        <form method=<?php if (\App\MyBabySittings\Configuration\ConfigurationSite::getDebug()) echo "get"; else echo "post" ?> action="controleurFrontal.php">
            <input type='hidden' name='action' value='creerDepuisFormulaire'>
            <input type="hidden" name="controleur" value="utilisateur">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nom <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" placeholder="Votre nom" name="nom" id="nom" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Prénom <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" placeholder="Votre prénom" name="prenom" id="prenom" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nom d'utilisateur <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" placeholder="Votre nom d'utilisateur" name="login" id="login" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse Email <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" placeholder="Votre email" name="email" id="email" required>
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
                <label class="form-label">Confirmer le mot de passe <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="password" class="form-control" name="confirm_mdp" id="confirm_mdp" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Vous possédez déjà un compte ? <a href="controleurFrontal.php?controleur=utilisateur&action=afficherFormulaireConnexion">Se connecter</a></label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Créer un compte <i class="bi bi-send"></i></button>
            </div>
        </form>
    </div>
</div>
