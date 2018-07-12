<h1>Carregamento</h1>
<p>
<a href="<?php echo BASE_URL; ?>CampeonatoControle/">Novo Campeonato</a>
<p>

Jogos Salvos
<select>
 
<?php 

foreach($viewData as $key => $value){
    echo '<option value="'.$viewData['key'].'">'.$value.'</option>'; 
} ?>
</select>

<button type="button">Carregar Jogo Selecionado</button>						
