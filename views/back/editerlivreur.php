<?php
include "C://xampp/htdocs/virupedia/controller/CrudLivreur.php";
include_once "C://xampp/htdocs/virupedia/model/Livreur.php";


$error = "";

// create Livreur


// create an instance of the controller
$Livreurr = new Livreurr();

if (
    isset($_POST["Nom_Livreur"]) &&
    isset($_POST["Prenom_Livreur"]) &&
    isset($_POST["Address_Livreur"]) &&
    isset($_POST["Login_Livreur"]) &&
    isset($_POST["Cin_Livreur"]) &&
    isset($_POST["Password_Livreur"]) &&
    isset($_POST["ImageUsers_Livreur"]) &&
    isset($_POST["Prenom_Livreur"]) &&
    isset($_POST["role_Livreur"])


) {
    if (
        !empty($_POST["Nom_Livreur"]) &&
        !empty($_POST["Prenom_Livreur"]) &&
        !empty($_POST["Address_Livreur"]) &&
        !empty($_POST["Login_Livreur"]) &&
        !empty($_POST["Cin_Livreur"]) &&
        !empty($_POST["Password_Livreur"]) &&
        !empty($_POST["ImageUsers_Livreur"]) &&
        !empty($_POST["Prenom_Livreur"]) &&
        !empty($_POST["role_Livreur"])


    ) {
        $Livreur = new Livreur(
            $_POST['Nom_Livreur'],
            $_POST['Prenom_Livreur'],
            $_POST['Address_Livreur'],
            $_POST['Login_Livreur'],
            $_POST['Cin_Livreur'],
            $_POST['Password_Livreur'],
            $_POST['ImageUsers_Livreur'],
            $_POST['role_Livreur']


        );
        $Livreurr->modifierLivreur($Livreur, $_GET['idUsers']);
        //header('Location:../front/blogs.php');
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

    <title>Editer Livreur</title>

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

                <div id="error">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_GET['idUsers'])) {
                    $Livreur = $Livreurr->recupererLivreur($_GET['idUsers']);
                ?>


                    <div class="container-fluid">

                        <div>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="id">id_Livreur</label>
                                    <input type="text" class="form-control" name="idUsers" id="idUsers" value="<?php echo $Livreur['idUsers']; ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="nom">nom_Livreur</label>
                                    <input type="text" class="form-control" name="Nom_Livreur" id="nom" value="<?php echo $Livreur['nameUsers']; ?> ">
                                </div>


                                <div class="form-group">
                                    <label for="prenom">prenom_Livreur</label>
                                    <input type="text" class="form-control" name="Prenom_Livreur" id="prenom" value="<?php echo $Livreur['lastnameUsers']; ?> ">
                                </div>

                                <div class="form-group">
                                    <label for="Address">adress</label>
                                    <input type="text" class="form-control" name="Address_Livreur" value="<?php echo $Livreur['address']; ?> ">
                                </div>

                                <div class="form-group">
                                    <label for="Login">Login</label>
                                    <input type="text" class="form-control" name="Login_Livreur" value="<?php echo $Livreur['Login']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="Cin">Cin</label>
                                    <input type="text" class="form-control" name="Cin_Livreur" value="<?php echo $Livreur['Cin']; ?> ">
                                </div>
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="text" class="form-control" name="Password_Livreur" value="<?php echo $Livreur['Password']; ?> ">
                                </div>

                                <div class="form-group">
                                    <label for="ImageUsers">Ajouter Image</label>
                                    <input type="file" class="form-control-file" name="ImageUsers_Livreur" value="<?php echo $Livreur['ImageUsers']; ?> ">
                                </div>



                                <div class="form-group">
                                    <label for="role">role</label>
                                    <input type="text" class="form-control" name="role_Livreur" value="<?php echo $Livreur['role']; ?> ">
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
                    echo "error ";
                }
?>
</body>

</html>