<h1>Fase de Grupos</h1>

<h2>Grupo 1</h2>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Times</th>
                <th>Pontos</th>
                <th>Pontos Sofridos</th>
                <th>Pontos Feitos</th>
                <th>Vitórias</th>
                <th>Derrotas</th>
                <th>Empates</th>
        	</tr>
    	</thead>
    	<tbody>
    	<?php
    	    $colunas = 7;
            $grupo1 = $viewData[0];
            
            for($i=0; $i < count($grupo1); $i++) {
                echo "<td>".$grupo1[$i]."</td>";
                if((($i+1) % $colunas) == 0 )
                    echo "</tr><tr>";
            }
        ?>
           

		</tbody>
	</table>
</div>
<h2>Grupo 2</h2>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Times</th>
                <th>Pontos</th>
                <th>Pontos Sofridos</th>
                <th>Pontos Feitos</th>
                <th>Vitórias</th>
                <th>Derrotas</th>
                <th>Empates</th>
        	</tr>
    	</thead>
    	<tbody>
    	<?php
    	    $colunas = 7;
            $grupo2 = $viewData[1];
            
            for($i=0; $i < count($grupo2); $i++) {
                echo "<td>".$grupo2[$i]."</td>";
                if((($i+1) % $colunas) == 0 )
                    echo "</tr><tr>";
            }
        ?>
           

		</tbody>
	</table>
</div>
<h2>Grupo 3</h2>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Times</th>
                <th>Pontos</th>
                <th>Pontos Sofridos</th>
                <th>Pontos Feitos</th>
                <th>Vitórias</th>
                <th>Derrotas</th>
                <th>Empates</th>
        	</tr>
    	</thead>
    	<tbody>
    	<?php
    	    $colunas = 7;
            $grupo3 = $viewData[2];
            
            for($i=0; $i < count($grupo3); $i++) {
                echo "<td>".$grupo3[$i]."</td>";
                if((($i+1) % $colunas) == 0 )
                    echo "</tr><tr>";
            }
        ?>
           

		</tbody>
	</table>
</div>
<h2>Grupo 4</h2>
<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Times</th>
                <th>Pontos</th>
                <th>Pontos Sofridos</th>
                <th>Pontos Feitos</th>
                <th>Vitórias</th>
                <th>Derrotas</th>
                <th>Empates</th>
        	</tr>
    	</thead>
    	<tbody>
    	<?php
    	    $colunas = 7;
            $grupo4 = $viewData[3];
            
            for($i=0; $i < count($grupo4); $i++) {
                echo "<td>".$grupo4[$i]."</td>";
                if((($i+1) % $colunas) == 0 )
                    echo "</tr><tr>";
            }
        ?>
           

		</tbody>
	</table>
</div>


