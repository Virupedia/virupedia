<?php
include "../../controller/userC.php";
include_once "../../model/users.php";


$UtilisateurC = new UtilisateurC();
$error = "";
if (
    isset($_POST["nameUsers"]) &&
    isset($_POST["lastnameUsers"]) &&
    isset($_POST["address"]) &&
    isset($_POST["Login"]) &&
    isset($_POST["Cin"]) &&
    isset($_POST["Password"]) 
) {
    if (
        !empty($_POST["nameUsers"]) &&
        !empty($_POST["lastnameUsers"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["Login"]) &&
        !empty($_POST["Cin"]) &&
        isset($_POST["Password"]) 

    ) {
        $utilisateur = new Utilisateur(
            $_POST['nameUsers'],
            $_POST['lastnameUsers'],
            $_POST['address'],
            $_POST['Login'],
            $_POST['Cin'],
            $_POST['Password']

        );
        $UtilisateurC->modifierUtilisateur($utilisateur, $_GET['idUsers']);
      //  header('Location:C://xampp/htdocs/testprojetweb/views/back/modifierUtilisateur.php');
    } else
        echo "Missing information";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editer utilisateur</title>

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

               

                <?php
                if(isset($_GET['idUsers'])) {
                    $utilisateur = $UtilisateurC->recupererUtilisateur($_GET['idUsers']);
                ?>


                    <div class="container-fluid">

                        <div>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="idUsers">idutilisateur</label>
                                    <input type="text" class="form-control" name="idUsers" id="idUsers" value="<?php echo $utilisateur['idUsers']; ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="nameUsers">nameUsers</label>
                                    <input type="text" class="form-control" name="nameUsers" id="nameUsers" value="<?php echo $utilisateur['nameUsers']; ?> ">
                                </div>


                                <div class="form-group">
                                    <label for="lastnameUsers">lastname</label>
                                    <textarea class="form-control" name="lastnameUsers" rows="10"> <?php echo $utilisateur['lastnameUsers']; ?>  </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="address">address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $utilisateur['address']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="Login">Login</label>
                                    <input type="text" class="form-control" name="Login" value="<?php echo $utilisateur['Login']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="Cin">Cin</label>
                                    <input type="text" class="form-control" name="Cin" value="<?php echo $utilisateur['Cin']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" class="form-control" name="Password" value="<?php echo $utilisateur['Password']; ?> ">
                                </div>
                           

                               



                                <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>

                            </form>
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
<?php
                } else {
                    echo "errorrrr ";
                }
?>
</body>

</html>