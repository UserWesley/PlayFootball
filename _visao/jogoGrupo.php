<h1 class="text-center">Jogos </h1>

<h5>Rodada 1</h5>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Time Casa</th>
                <th>Pontos</th>
                <th>Pontos</th>
                <th>TimeVisitante</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 4;
$rodada1 = $viewData[0];
for($i=0; $i < count($rodada1); $i++) {
    echo "<td>".$rodada1[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>

<h5>Rodada 2</h5>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Time Casa</th>
                <th>Pontos</th>
                <th>Pontos</th>
                <th>TimeVisitante</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 4;
$rodada2 = $viewData[1];
for($i=0; $i < count($rodada2); $i++) {
    echo "<td>".$rodada2[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>

<h5>Rodada 3</h5>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Time Casa</th>
                <th>Pontos</th>
                <th>Pontos</th>
                <th>TimeVisitante</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 4;
$rodada3 = $viewData[2];
for($i=0; $i < count($rodada3); $i++) {
    echo "<td>".$rodada3[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>

<h5>Rodada 4</h5>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Time Casa</th>
                <th>Pontos</th>
                <th>Pontos</th>
                <th>TimeVisitante</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 4;
$rodada4 = $viewData[3];
for($i=0; $i < count($rodada4); $i++) {
    echo "<td>".$rodada4[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>
	
	<h5>Rodada 5</h5>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Time Casa</th>
                <th>Pontos</th>
                <th>Pontos</th>
                <th>TimeVisitante</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 4;
$rodada5 = $viewData[4];
for($i=0; $i < count($rodada5); $i++) {
    echo "<td>".$rodada5[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>
	<h5>Rodada 6</h5>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Time Casa</th>
                <th>Pontos</th>
                <th>Pontos</th>
                <th>TimeVisitante</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 4;
$rodada6 = $viewData[5];
for($i=0; $i < count($rodada6); $i++) {
    echo "<td>".$rodada6[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>