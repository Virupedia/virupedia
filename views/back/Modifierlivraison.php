<?php require_once "C://wamp64/www/test2/TravailProjet/newwork/Projetwebtest - Copy/Controller/Crudlivraison.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editer les livraison</title>

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

                        $livraisonr = new livraisonr();
                        $livraisonrr = new livraisonr();
                        
                        $listelivraison = $livraisonr->afficherlivraison();
                        
                       $dataPoints = array(
                           array("label"=> "Delivered", "y"=> (int)$livraisonrr->CountLivraisonlivre()),
                            array("label"=> "Undelivered", "y"=> (int)$livraisonrr->CountLivraisonnonlivre())
                        
                        );
                      
                        
                       if(isset($_GET['recherche']))
                       {
                        $search_value=$_GET["recherche"];
                        $livraisonr= new livraisonr();
                        $listelivraison=$livraisonr->recherche($search_value);
                        }
                        if(isset($_GET['maction']))
                        {$maction=$_GET['maction'];
    
                        $par=$_GET['par'];
   
                        $listelivraison=$livraisonr->trier($par); 
                       }
                        ?>
                         
                        <table class="table table-striped table-sm table-dark">
                        <tr>
                              <th scope="col" class="bg-primary">Id Livraison</th>
                              <th scope="col" class="bg-primary">Date de la livraison </th>
                              <th scope="col" class="bg-primary">Etat</th>
                              <th scope="col" class="bg-primary">Address</th>
                              <th scope="col" class="bg-primary">IdLivreur</th>
                              <th scope="col" class="bg-primary">Actions</th>
                              <th scope="col" class="bg-primary"> </th>
                              <th scope="col" class="bg-primary"> </th>
                        
                            </tr>

                            <div class="card-body">
                          <form method="get" action="Modifierlivraison.php" >
                              <input type="text" class=" btn btn-dark float-right" name="recherche" placeholder=" dans Les Livraisons">
                              <input type="submit" class="btn btn-dark float-right"  value="Chercher">
                          </form>

                          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              sort by
                          </a>

                          <div class="dropdown-menu " aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item " href="Modifierlivraison.php?maction=trier&par=idlivraison">idlivraison</a>
                              <a class="dropdown-item " href="Modifierlivraison.php?maction=trier&par=date_liv">date_liv</a>
                              <a class="dropdown-item " href="Modifierlivraison.php?maction=trier&par=etat">etat</a>
                              <a class="dropdown-item " href="Modifierlivraison.php?maction=trier&par=AddressLivraison">Adress</a>
                          </div>
						  <div><p>&nbsp;</p></div>


                            <?PHP
                            foreach ($listelivraison as $row) {
                            ?>
                                <tr>
                                    <td><?PHP echo $row['idlivraison']; ?></td>
                                    <td><?PHP echo $row['date_liv']; ?></td>
                                    <td><?PHP echo $row['etat']; ?></td>
                                    <td><?PHP echo $row['AddressLivraison']; ?></td>
                                    <td><?PHP echo $row['idUsers']; ?></td>
                                    
                                    
                                    

                                    <td>
                                        <form method="POST"  action="../../controller/supprimerlivraison.php">
                                            <input type="submit" name="supprimer" class="btn btn-danger" value="supprimer">
                                            <input type="hidden" value=<?PHP echo $row['idlivraison']; ?> name="idlivraison">
                                            
                                        </form>
                                    </td>
                                    <td>
                                        <a href="editerlivraison.php?idlivraison=<?PHP echo $row['idlivraison']; ?>"class="btn btn-info"> Modifier </a>
                                    </td>
                                    <td>
                                        
                                    <a href="AffecterLivreurLivraison.php?&id=<?=$row['idlivraison']; ?>"class="btn btn-primary"> Affecter livreur </a> 
                                    </td>
                                </tr>
                                
                                
                            <?PHP
                            }
                            ?>
                            </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h8">La Liste des livraisons:</h3>
                    </div>
                    <div class="card-body">
                    
                        </table>
                        
                        <script>
                    window.onload = function () {

                        var chart = new CanvasJS.Chart("chartContainer", {
							theme: "light1",
                            animationEnabled: true,
                            exportEnabled: true,
                            title:{
                                text: "Delivery State"
                            },
                            
                            data: [{
                                type: "pie",
                                showInLegend: "true",
                                legendText: "{label}",
                                indexLabelFontSize: 16,
                                indexLabel: "{label} - #percent%",
                                yValueFormatString: "฿#,##0",
                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();

                    }
                </script>
                <div id="chartContainer" style="height: 400px; width: 90%;"></div>
                <script src="../../lib/canvasjs.min.js"></script>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <a href="modifierlivraison.php" class="btn btn-primary"> retour</a>
                
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

</body>

</html>