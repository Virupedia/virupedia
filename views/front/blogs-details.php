<?php
session_start();

require_once 'header_main.php';
?>

<!-- header -->
<?php require_once 'header.php'; ?>
<!-- //header -->

<?php
include "../../controller/ajouterArticle.php";
include_once "../../model/Articles.php";


$articleC = new articleC();
$idarticle = $_GET['idNewsArticle'];
$idUsers = 3;

$error = "";
if (
    isset($_POST["titre"]) &&
    isset($_POST["texte"]) &&
    isset($_POST["auteur"]) &&
    isset($_POST["source"]) &&
    isset($_POST["urlImage"]) &&
    isset($_POST["notifCreateur"]) &&
    isset($_POST["Datearticle"])
) {
    if (
        !empty($_POST["titre"]) &&
        !empty($_POST["texte"]) &&
        !empty($_POST["auteur"]) &&
        !empty($_POST["source"]) &&
        !empty($_POST["urlImage"]) &&
        isset($_POST["notifCreateur"]) &&
        isset($_POST["Datearticle"])

    ) {
        $article = new article(
            $_POST['titre'],
            $_POST['texte'],
            $_POST['auteur'],
            $_POST['source'],
            $_POST['urlImage'],
            $_POST['notifCreateur'],
            $_POST['Datearticle']

        );
    } else
        echo "Missing information";
}
?>


<?php
//commentaires 
include "../../controller/CommentairesC.php";
include_once "../../model/Commentaire.php";

// create comment

$commentaire = null;
$today = date("y.m.d");
$commentaireC = new CommentairesC();

if (
    isset($_POST["textecomment"])
) {
    if (
        !empty($_POST["textecomment"])
    ) {

        if ($commentaireC->verifierCommentaire($_POST['textecomment']) == 0) {
?> <p class="p-3 mb-0 bg-danger text-white ">
                <?php echo "beep : You can't write that" ?> </p>
        <?php
        } else {


            $commentaire = new Commentaire(
                $_POST['textecomment'],
                $today
            );
            //  $idUsers = 3;
            // $commentaireC->ajouterCommentaire($commentaire, 7, $idUsers);

            $commentaireC->ajouterCommentaire($commentaire, $idarticle, $idUsers);
        } ?>
        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    <?php } else ?>

    <?php //echo "Missing information" 
    ?> </p> <?php
        }

            ?>




<!-- Page Content -->
<div class="container">


    <div id="error">
        <?php echo $error; ?>
    </div>


    <div class="row">

        <?php
        if (isset($_GET['idNewsArticle'])) {
            $article = $articleC->recupererarticle($_GET['idNewsArticle']);
        ?>

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <form method="POST" action="">




                    <!-- Title -->
                    <h1 class="mt-4"><?php echo $article['titre']; ?></h1>

                    <!-- Author -->
                    <p class="lead">
                        by
                        <a href="#"><?php echo $article['auteur']; ?></a>
                    </p>

                    <hr>

                    <!-- Date/Time -->
                    <p> Date Publication : <?php echo $article['Datearticle'];  ?></p>

                    <hr>

                    <!-- Preview Image -->
                    <img class="img-fluid rounded" src="images/<?php echo $article['urlImage']; ?>" alt="">

                    <hr>

                    <!-- Post Content -->
                    <p class="lead"><?php echo $article['texte']; ?></p>

                    <blockquote class="blockquote">
                        <footer class="blockquote-footer">Someone famous in
                            <cite title="Source Title"><?php echo $article['source']; ?></cite>
                        </footer>
                    </blockquote>



                    <hr>

                </form>






                <!--<form method="post" action="">
                    <div class="form-group">
                        <label for="texte"><b>Commentaires : </b></label>
                        <input type="text" class="form-control" name="texte" id="texte" placeholder="Entrer le commentaire">
                    </div>

                    <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>

                </form>-->


                <?php
                $listecomment = $commentaireC->afficherCommentairesarticle($idarticle); ?>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="textecomment" id="textecomment" value='<?php echo isset($_POST['textecomment']) ? $_POST['textecomment'] : ''; ?> '></textarea>

                            </div>
                            <button type="submit" value="Envoyer" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>


                <?PHP

                foreach ($listecomment as $comment) {
                ?>

                    <!-- Single Comment -->
                    <div class="media mb-4">
                        <img width="100" class="d-flex mr-3 rounded-circle" src="images/login.jpg" alt="">
                        <div class="media-body">
                            <h5 class="mt-0"><?PHP echo $comment->nameUsers; ?></h5>
                            <h5 class="mt-0"><?PHP echo $comment->lastnameUsers; ?></h5>
                            <h5 class="mt-0"><?PHP echo $comment->texte; ?></h5>
                            <?PHP echo $comment->idUsers; ?>
                            <?PHP echo $comment->idNewsArticle; ?>
                            <?PHP echo $comment->dateCommentaire; ?>
                            <?php if ($comment->idUsers == $idUsers) { ?>

                                <a onclick="return confirm('Vous êtes sure de supprimer votre commentaire ?');" href="../../controller/supprimerCommentaires.php?idCommentaire=<?php echo $comment->idCommentaire; ?>">
                                    <input value="supprimer" type="submit" class="btn btn-danger deleteCommentaire">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </a>
                            <?php        } ?>
                        </div>
                    </div>

                <?PHP
                }

                ?>

                <!-- Comment with nested comments -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.



                    </div>
                </div>

            </div>


    </div>
    <!-- /.row -->

    <!-- /.container -->



<?php
        } else {
            echo "error ";
        }
?>



<?php require_once 'footer.php';
?>