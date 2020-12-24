<?php
include_once 'C://wamp64/www/test2/TravailProjet/newwork/Projetwebtest - Copy/Model/livraison.php';
include_once 'C://wamp64/www/test2/TravailProjet/newwork/Projetwebtest - Copy/Controller/Crudlivraison.php';

$error = "";

// create livraison
$livraison = null;

// create an instance of the controller
$livraisonr = new livraisonr();
if (
    isset($_POST["date_livraison"]) &&
    isset($_POST["etat_livraison"]) &&
    isset($_POST["Adresse_livraison"])
    
   
    
    )
 {
    if (
        !empty($_POST["date_livraison"]) &&
        !empty($_POST["etat_livraison"]) &&
        !empty($_POST["Adresse_livraison"])
        
        
        

    ) {
        $livraison = new livraison(
            $_POST['date_livraison'],
            $_POST['etat_livraison'],
            $_POST['Adresse_livraison']
        
            

        );
        $livraisonr->Ajouterlivraison($livraison);
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

    <title>ajouter livraison</title>

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
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="date_livraison">date_livraison</label>
                                <input type="text" class="form-control" name="date_livraison" id="date_livraison" placeholder="Entrer le date_livraison">
                            </div>

                            <div class="form-group">
                                <label for="etat_livraison">etat</label>
                                <input  class="form-control" name="etat_livraison" type="text">
                            </div>


                            <div class="form-group">
                                <label for="Adresse_livraison">Adresse De la Livraison</label>
                                <input  class="form-control" name="Adresse_livraison" type="text">
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

</body>

</html>