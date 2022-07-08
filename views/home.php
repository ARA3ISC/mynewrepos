<?php
if (!defined('MyConst')) {
    die('Direct access not permitted');
}


if (isset($_POST['find'])) {
    $data = new EmployeController();
    $employes = $data->findEmployes();
} else {
    $data = new EmployeController();
    $employes = $data->getAllEmployes();
}

if (isset($_SESSION['deleted'])) : ?>
    echo '<div id="success-alert" class="alert alert-success" role="alert">
        Supprimé avec succes
    </div>'
<?php endif;

if (isset($_POST['btn-supp'])) {
    $data = new EmployeController();
    $data->deleteEmploye();
}
?>



<style>
    ::selection {
        background-color: #FFAD01;
        color: #FFF;
    }
</style>
<title>Dashboard - gestion employés</title>
<div class="wrapper" style="min-height: 100vh">
    <div class="card card-header text-center">
        <h1>Welcome <span class="text-success"> <?php echo $_SESSION['username']; ?></span>
        </h1>
    </div>
    <div class="col-md-8 mx-auto my-4">
        <div class="card">
            <div class="card-body bg-light">

                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded" placeholder="Recherche" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary my-1 mx-1 " type="submit" name="find">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>


                <table class="table table-hover">
                    <thead class=" table-primary">
                        <tr>
                            <th scope="col">Nom et Prénom</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Département</th>
                            <th scope="col">Poste</th>
                            <th scope="col">Date d'embauche</th>
                            <th scope="col">statut</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employes as $emp) : ?>
                            <tr>

                                <td><?php echo $emp['nom'] . " " . $emp['prenom'] ?></td>
                                <td><?php echo $emp['matricule'] ?></td>
                                <td><?php echo $emp['depart'] ?></td>
                                <td><?php echo $emp['poste'] ?></td>
                                <td>
                                    <?php
                                    $dt = new DateTime($emp['date_emb']);
                                    echo $dt->format('Y-m-d');
                                    ?>
                                </td>
                                <?php if ($emp['statut'] == 1) : ?>
                                    <td>
                                        <span class="bg-success p-0 m-1 rounded text-light d-flex justify-content-center">Active</span>
                                    </td>
                                <?php else : ?>
                                    <td>
                                        <span class="bg-danger p-0 m-1 rounded text-light d-flex justify-content-center">Résilié</span>
                                    </td>
                                <?php endif; ?>
                                <td class="d-flex">
                                    <form class="mr-1 d-inline" method="post" action="update">
                                        <input type="hidden" id="id" name="id" value="<?php echo $emp['id'] ?>">
                                        <button class="btn btn-sm btn-warning ">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </form>
                                    <div class="mr-1">
                                        <!-- <input type="hidden" id="id" name="id" value="<?php echo $emp['id'] ?>"> -->
                                        <button type="submit" id="btnDelete" name="btnDelete" class="btn-supp mx-1 btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" data-bs-whatever=<?php echo $emp['id'] ?>>

                                            <i class="fa fa-trash"></i>
                                        </button>



                                    </div>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <form action="<?php echo BASE_URL ?>add" method="post">
                                <div class="d-grid gap-2 my-2">
                                    <input type="submit" name="btnAdd" class="btn btn-primary block lg" value="Ajouter">
                                </div>
                            </form>

                        </tr>
                    </tfoot>
                </table>
                <!-- modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmation!</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimer cet employé ?

                                    <input type="hidden" name="id" id="recipient-name" />

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                                    <!-- <input type="hidden" name="idd"> -->
                                    <button id="btn-supp" type="submit" name="btn-supp" class="btn-supp btn btn-danger">Supprimer</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button>

        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <!-- <img src="..." class="rounded me-2" alt="..."> -->
                    <strong class="me-auto">Bootstrap</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
        </div>


    </div>


    <!--  -->

    <script type="text/javascript" src="views/includes/js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>