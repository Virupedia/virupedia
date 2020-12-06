<?php require_once 'header_main.php';
?>

<!-- header -->
<?php require_once 'header.php'; ?>
<!-- //header -->


<?php include "../../controller/ajouterArticle.php";

$articleC = new articleC();
$listearticles = $articleC->afficherarticle();

?>
<!--
<div class="row ">

    <div class="col-lg-4">


        <div class="card h-100">

            <?PHP
            //foreach ($listearticles as $row) {
            ?>
                <?PHP// echo $row['titre']; ?>
                <?PHP// echo $row['texte']; ?>
                <?PHP //echo $row['auteur']; 
                ?>
                <?PHP //echo $row['source']; 
                ?>
                <?PHP //echo $row['urlImage']; 
                ?>
                <?PHP //echo $row['notifCreateur']; 
                ?>

                <a href="#"><img class="card-img-top" src="images/<?PHP// echo $row['urlImage']; ?>" alt=""> </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#"><?PHP// echo $row['titre'];
                                    ?></a>
                    </h4>
                    <h5> <?PHP// echo $row['auteur'];
                            ?></h5>
                    <p class="card-text"> <?PHP// echo $row['texte'];
                                            ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Date publication: <?php// echo $row['Datearticle'] ?></small>


                </div>
            <?PHP// }
            ?>
        </div>

    </div>

</div>-->

<!-- Page Features -->

<div class="row text-center ">


    <?PHP
    foreach ($listearticles as $row) {
    ?>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 bg-white text-black border-danger">
                <img class="card-img-top" src="images/<?PHP echo $row['urlImage']; ?>" alt="">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold mb-2">
                        <?PHP echo $row['titre']; ?>
                    </h4>
                    <?PHP $out = strlen($row['texte']) > 100 ? substr($row['texte'], 0, 100) . "..." : $row['texte'];  ?>
                    <p class="card-text "><?PHP echo $out  ?></p>
                    <ul class="list-group list-group-flush">
                        <p class="list-group-item text-danger"><?PHP echo $row['auteur'];  ?></p>
                        <p class="list-group-item"><?PHP echo $row['source'];  ?></p>
                    </ul>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Date publication: <?php echo $row['Datearticle'] ?></small>
                    <a class="btn btn-danger" href="blogs-details.php?idNewsArticle=<?PHP echo $row['idNewsArticle']; ?>">Read More!</a>
                </div>
            </div>
        </div>
    <?PHP }
    ?>















</div>
<!-- /.row -->
<!--</div>-->

<!-- /.container -->









<?php require_once 'footer.php';
?>