
<h1>Jogadores do meu Time </h1>

<div class="table-responsive">
    <table class="table">
    	<thead>
            <tr class = "info">
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Posição</th>
                <th>Agilidade</th>
                <th>Chute</th>
                <th>Força</th>
        		<th>Lançamento</th>
                <th>Pegar</th>
                <th>Marcacao</th>
                <th>Resistência</th>
                <th>Salto</th>
                <th>Tackle</th>
                <th>Velocidade</th>
        	</tr>
    	</thead>
    	<tbody>

<?php
$colunas = 16;

for($i=0; $i < count($viewData); $i++) {
    echo "<td>".$viewData[$i]."</td>";
    if((($i+1) % $colunas) == 0 )
        echo "</tr><tr>";
}
?>      
    	</tbody>
	</table>
</div>