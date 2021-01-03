<?php require_once "C://xampp/htdocs/virupedia/controller/CrudLivreur.php" ?>

<?php

//pagination

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perpage = isset($GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 3;

//echo $page;
//echo $perpage;

$livreurr = new livreurr();
$listelivreur = $livreurr->AfficherlivreurPaginer($page, $perpage);

$totalP = $livreurr->calcTotalRows($perpage);


?>
<!DOCtype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edite livreur</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once 'sidebar.php';
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once 'topbar.php';
                ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div>
                        <?PHP

                        $livreurr = new livreurr();

                        if (isset($_GET['maction'])) {
                            $maction = $_GET['maction'];

                            $par = $_GET['par'];
                            $listelivreur = $livreurr->trier($par);
                        }
                        if (isset($_GET['recherche'])) {
                            $search_value = $_GET["recherche"];
                            $livreurr = new livreurr();
                            $listelivreur = $livreurr->recherche($search_value);
                        }
                        ?>



                        <table class="table table-striped table-sm table-dark">
                            <tr>
                                <th scope="col" class="bg-primary">Id</th>
                                <th scope="col" class="bg-primary">Name</th>
                                <th scope="col" class="bg-primary">Last Name</th>
                                <th scope="col" class="bg-primary">Address</th>
                                <th scope="col" class="bg-primary">Login</th>
                                <th scope="col" class="bg-primary">Cin</th>
                                <th scope="col" class="bg-primary">Password</th>

                                <th scope="col" class="bg-primary">His Role</th>
                                <th scope="col" class="bg-primary">Number of Deliveries </th>
                                <th scope="col" class="bg-primary">Delivery man'Image</th>
                                <th scope="col" class="bg-primary">Actions</th>
                                <th scope="col" class="bg-primary"> </th>
                                <th scope="col" class="bg-primary"> </th>

                            </tr>
                            <div class="card-body">
                                <form method="get" action="Modifierlivreur.php">
                                    <input type="text" class=" btn btn-dark float-right" name="recherche" placeholder=" dans Les Livreurs">
                                    <input type="submit" class="btn btn-dark float-right" value="Chercher">
                                </form>
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    sort by
                                </a>

                                <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item " href="Modifierlivreur.php?maction=trier&par=idUsers">Id</a>
                                    <a class="dropdown-item " href="Modifierlivreur.php?maction=trier&par=Cin">Cin</a>
                                    <a class="dropdown-item " href="Modifierlivreur.php?maction=trier&par=nameUsers">Name</a>
                                    <a class="dropdown-item " href="Modifierlivreur.php?maction=trier&par=nblivraison">Number of Deliveries</a>
                                </div>
                                <div>
                                    <p>&nbsp;</p>
                                </div>
                                <?PHP
                                foreach ($listelivreur as $row) {
                                ?>
                                    <tr>
                                        <td><?PHP echo $row['idUsers']; ?></td>
                                        <td><?PHP echo $row['nameUsers']; ?></td>
                                        <td><?PHP echo $row['lastnameUsers']; ?></td>
                                        <td><?PHP echo $row['address']; ?></td>
                                        <td><?PHP echo $row['Login']; ?></td>
                                        <td><?PHP echo $row['Cin']; ?></td>
                                        <td><?PHP echo $row['Password']; ?></td>




                                        <td style="text-align: center;vertical-align: middle;"> <?PHP echo $row['role']; ?> </td>
                                        <td style="text-align: center;vertical-align: middle;"> <?PHP echo $row['nblivraison']; ?> </td>
                                        <td class="table-img">
                                            <img width="100" src="../front/images/<?PHP echo $row['ImageUsers']; ?> ">
                                        </td>

                                        <td>
                                        <td>
                                            <form method="POST" action="../../controller/SupprimerLivreur.php">
                                                <input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
                                                <input type="hidden" value=<?PHP echo $row['idUsers']; ?> name="idUsers">
                                            </form>
                                        </td>



                                        <td>
                                            <a href="editerlivreur.php?idUsers=<?PHP echo $row['idUsers']; ?>" class="btn btn-info"> Modifier </a>

                                        </td>

                                    </tr>
                                <?PHP
                                }
                                ?>
                                <div class="card-header d-flex align-items-center">
                                    <h3 class="h8">La Liste des Livreurs:</h3>

                                </div>

                                <div class="card-body">

                        </table>
                        <!--pagination begin-->
                        <?php

                        // }
                        for ($x = 1; $x <= $totalP; $x++) :

                        ?>

                            <a href="?page=<?php echo $x; ?>&per-page=<?php echo $perpage; ?>"><?php echo $x; ?></a>

                        <?php endfor; ?>
                        <!--pagination end-->
                    </div>

                </div>
                <!-- /.container-fluid -->
                <a href="modifierlivreur.php" class="btn btn-primary"> retour</a>
            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>