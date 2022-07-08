<?php

if (isset($_POST['submit'])) {
    $newEmploye = new EmployeController();
    $newEmploye->addEmploye();
} ?>


<title>Ajout - gestion employés</title>
<div class="container">
    <div class="col-md-6 mx-auto my-4">
        <div class="card">
            <div class="card-header h3">Ajouter un employé</div>
            <div class="card-body bg-light">

                <form method="post" class="p-2 needs-validation" novalidate>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="nom">Nom :*</label>
                        <input type="text" name="nom" class="form-control" placeholder="Nom" id="txtNom" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le nom
                        </div>


                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="prenom">Prénom :*</label>
                        <input type="text" name="prenom" class="form-control" placeholder="Prénom" id="txtPrenom" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le prénom
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="mat">Matricule :*</label>
                        <input type="number" name="mat" class="form-control" placeholder="Matricule" id="txtMat" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le matricule
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="dep">Département :*</label>
                        <input type="text" name="dep" class="form-control" placeholder="Département" id="txtDep" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le département
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="poste">Poste :*</label>
                        <input type="text" name="poste" class="form-control" placeholder="Poste" id="txtPoste" required>
                        <div class="invalid-feedback">
                            Veuillez remplir le poste
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="date_emb">Date embauche :*</label>
                        <input type="date" name="date_emb" class="form-control" placeholder="Date d'embauche" id="txtDate" required>
                        <div class="invalid-feedback">
                            Veuillez choisir une date
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="d-flex" for="dep">statut :*</label>
                        <select class="form-control" name="statut">
                            <option value="1">Active</option>
                            <option value="0">Résilié</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary ms-auto" type="submit" name="submit" id="btnSubmit">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="views/includes/js/script.js"></script>