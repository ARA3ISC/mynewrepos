<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }
if (isset($_POST['id'])) {
    $getEmploye = new EmployeController();
    $employe = $getEmploye->getEmployeDetails();
}
else{
    Redirect::to('home');
}
if (isset($_POST['submit'])) {
    $updateEmploye = new EmployeController();
    $updateEmploye->updateEmploye();
}


?>
<div class="container">
    <div class="col-md-10 mx-auto my-4">
        <div class="card">
            <div class="card-header h3">Modifier un employé</div>
            <div class="card-body bg-light">

                <form class="p-2 needs-validation" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="nom">Nom :*</label>
                        <input type="text" name="nom" class="form-control" value="<?php echo $employe->nom; ?>" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le nom
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="prenom">Prénom :*</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Prénom" value="<?php echo $employe->prenom; ?>" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le prénom
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="mat">Matricule :*</label>
                        <input type="number" name="mat" class="form-control" placeholder="Matricule" value="<?php echo $employe->matricule; ?>" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le matricule
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="dep">Département :*</label>
                        <input type="text" name="dep" class="form-control" placeholder="Département" value="<?php echo $employe->depart ?>" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le département
                        </div>
                        <input type="hidden" name="id" value="<?php echo $employe->id ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="poste">Poste :*</label>
                        <input type="text" name="poste" class="form-control" placeholder="Poste" value="<?php echo $employe->poste; ?>" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le poste
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="date_emb">Date embauche :*</label>
                        <input type="date" name="date_emb" class="form-control" placeholder="Date d'embauche" required>
                        <div class="invalid-feedback">
                            Veuillez choisir une date
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="dep">statut :*</label>
                        <select class="form-control" name="statut">
                            <option value="1" <?php echo $employe->statut ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?php echo !$employe->statut ? 'selected' : '' ?>>Résilié</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary ms-auto" type="submit" name="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="views/includes/js/script.js"></script>