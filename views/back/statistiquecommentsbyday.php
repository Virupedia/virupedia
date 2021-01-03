<?php
require_once  'C:/xampp/htdocs/virupedia/config.php';
$db = config::getConnexion();

$req1 = $db->query("SELECT COUNT(C.idCommentaire) as total ,A.titre FROM commentaire C , newsarticle A where C.idNewsArticle=A.idNewsArticle AND C.dateCommentaire=CURDATE() GROUP by A.idNewsArticle");
$req1->execute();
$liste = $req1->fetchALL(PDO::FETCH_OBJ);
$req2 = $db->query("SELECT COUNT(idCommentaire) as nb FROM commentaire");
$nb = $req2->fetch();

$dataPoints = array();
foreach ($liste as $row) {
    $dataPoints[] = array('label' => $row->titre, 'y' => $row->total / intval($nb['nb']) * 100);
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light1",
                title: {
                    text: "Number of comments by article last day "
                },

                data: [{
                    type: "pie",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",

                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>