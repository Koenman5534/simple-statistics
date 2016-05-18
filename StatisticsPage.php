
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
<!-- require the CallData file -->
<?php require 'CallData.php';?>

<!-- some simple CSS for easy use... This can be edited or removed -->
<style>
.vrapper {
    padding-left: 40%;
}
.First .Second {}
</style>
<head><meta charset="UTF-8"></head>
<div class="vrapper">
<div class="First">
<h3>Aantal Unieke bezoekers per maand</h3><br />
<canvas id="Mycanvas" width="400" height="400"></canvas>
</div>


<script>
 
var ctx = document.getElementById("Mycanvas").getContext("2d");
var InkomendegegevensMaand = <?php echo json_encode($data); ?>;

 
 var d = new Date();
 var month = new Array();
 month[0] = "januarie";
 month[1] = "februari";
 month[2] = "maart";
 month[3] = "april";
 month[4] = "mei";
 month[5] = "juni";
 month[6] = "julie";
 month[7] = "augustus";
 month[8] = "september";
 month[9] = "oktober";
 month[10] = "november";
 month[11] = "december";
var n = month[d.getMonth()]; 



// show actual month
document.write("Actuele maand: ", n , "<br />");
// show actual year
document.write("Actueel jaar: ", new Date().getFullYear() , "<br />");
//unique sectie
document.write("<h3>gegevens van unique gebruikers</h3>");
document.write("unieke bezoekers in dit jaar: " ,<?php echo $uniqueTotalresult; ?>, "<br />");
document.write("Gemiddelde aantal unieke bezoekers per maand(jaar): " , <?php echo $dataAvgunique; ?> , "</br >");
//total sectie
document.write("<h3>Gegevens van alle gebruikers en bezoeken</h3>");
document.write("Totaal aantal bezoeken op alle pagina's: ",<?php echo $yearTotalresult; ?>);



/*filling up the graph from GraphJS */
var Maanddata = {
    labels: ["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"  ], 
    datasets: [
        {
            label: "Inkomende gegevens per maand", 
            type: "bar",
            fillColor: "rgba(255, 86, 0,0.8)",
            strokeColor: "rgba(255, 86, 0, 0.8)",
            highlightFill: "rgba(255,102,25, 0.75)",
            highlightStroke: "rgba(255, 86, 0,1)",
            data: <?php echo json_encode($data); ?>
        }
    ]
};
var chart = new Chart(ctx).Bar(Maanddata);

</script>
</div>
