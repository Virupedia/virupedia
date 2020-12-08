<?php require_once "C://xampp/htdocs/Virupedia/virupedia/controller/userC.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> SB Admin 2 - 404 </title>

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

                        $utilisateurC = new UtilisateurC();
                        $listeUsers = $utilisateurC->afficherUtilisateurs();
                        ?>
                        <table border=1 align='center'>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Adress</th>
                                <th>Login</th>
                                <th>Cin</th>
                                <th>Password</th>
                                <th>supprimer</th>
                                <th>modifier</th>
                            </tr>

                            <?PHP
                            foreach ($listeUsers as $user) {
                            ?>
                                <tr>
                                    <td><?PHP echo $user['idUsers']; ?></td>
                                    <td><?PHP echo $user['nameUsers']; ?></td>
                                    <td><?PHP echo $user['lastnameUsers']; ?></td>
                                    <td><?PHP echo $user['address']; ?></td>
                                    <td><?PHP echo $user['Login']; ?></td>
                                    <td><?PHP echo $user['Cin']; ?></td>
                                    <td><?PHP echo $user['Password']; ?></td>

                                    <td>
                                        <form method="POST" action="../../controller/supprimerUtilisateurs.php">
                                            <input type="submit" name="supprimer" value="supprimer">
                                            <input type="hidden" value=<?PHP echo $user['idUsers']; ?> name="id">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="modifierUtilisateur.php?idUsers=<?PHP echo $user['idUsers']; ?>"> Modifier </a>
                                    </td>
                                </tr>
                            <?PHP
                            }
                            ?>
                        </table>

                    </div>

                </div>
                <!-- /.container-fluid -->

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