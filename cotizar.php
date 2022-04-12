<?php

include_once "views/navbar-header.php";

require 'vendor/autoload.php';
date_default_timezone_set('America/Santiago');

$s_1 = 0;
$s_2 = 0;
$s_3 = 0;
$s_4 = 0;
$s_5 = 0;
$s_6 = 0;
$s_7 = 0;
$s_8 = 0;
$s_9 = 0;
$s_10 = 0;
$s_11 = 0;
$s_12 = 0;

$h_1 = 0;
$h_2 = 0;
$h_3 = 0;
$h_4 = 0;
$h_5 = 0;
$h_6 = 0;
$h_7 = 0;
$h_8 = 0;
$h_9 = 0;
$h_10 = 0;
$h_11 = 0;
$h_12 = 0;

if (isset($_GET['id'])){
	$client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->redsocial->cotizaciones;
	$cotizacion = $collection->findOne([
            '_id' => new MongoDB\BSON\ObjectId($_GET['id'])
            ]);
	if ($cotizacion != null){
		$s = $cotizacion['sueldos'];
		$h = $cotizacion['honorarios'];
		$nombre = $cotizacion['nombre'];
		$s_1 = $s[1];
		$s_2 = $s[2];
		$s_3 = $s[3];
		$s_4 = $s[4];
		$s_5 = $s[5];
		$s_6 = $s[6];
		$s_7 = $s[7];
		$s_8 = $s[8];
		$s_9 = $s[9];
		$s_10 = $s[10];
		$s_11 = $s[11];
		$s_12 = $s[12];

		$h_1 = $h[1];
		$h_2 = $h[2];
		$h_3 = $h[3];
		$h_4 = $h[4];
		$h_5 = $h[5];
		$h_6 = $h[6];
		$h_7 = $h[7];
		$h_8 = $h[8];
		$h_9 = $h[9];
		$h_10 = $h[10];
		$h_11 = $h[11];
		$h_12 = $h[12];
	}
}
?>
    <body>
    <!--<button onclick= "actualizar()" class="btn btn-outline-primary" type="submit">Actualizar</button> -->
    <div class ="row">
        <div class = "container col-sm-7">
            <div class = "card my-4">
                <div class = "card-body mx-2">
				<?php
				if (isset($_GET['id'])){
					echo '<p class="fs-4 mb-4">' .$nombre . '</p>';
				}
				
				?>
				<form action="/html/new-cotizacion.php" method="POST">
                    <table class="table table-bordered">
				  <thead>
					<tr>
					  <th scope="col">Meses</th>
					  <th scope="col">Sueldos</th>
					  <th scope="col">Honorarios</th>
					  
					</tr>
				 
				 </thead>
				  
				  <tbody>
					<tr>
					  <th scope="row", div class="col-2">Enero</th>
					   <td> 
					   <?php
							echo '<input name="s_1" type="number" value="' .$s_1 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_1" type="number" value="' .$h_1 . '" min="0" />'."\n";
						?>
					   </td>
					  
				   </tr>
				  
				  <tr>
					  <th scope="row", div class="col-2">Febrero</th>
					 
					   <td> 
					  <?php
							echo '<input name="s_2" type="number" value="' .$s_2 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_2" type="number" value="' .$h_2 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
				  
					<tr>
					  <th scope="row", div class="col-2">Marzo</th>
					  
					   <td> 
					  <?php
							echo '<input name="s_3" type="number" value="' .$s_3 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_3" type="number" value="' .$h_3 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					 
					 <tr>
					  <th scope="row", div class="col-2">Abril</th>
					  
					   <td> 
					  <?php
							echo '<input name="s_4" type="number" value="' .$s_4 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_4" type="number" value="' .$h_4 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					
					<tr>
					  <th scope="row", div class="col-2">Mayo</th>
					 
					   <td> 
					  <?php
							echo '<input name="s_5" type="number" value="' .$s_5 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_5" type="number" value="' .$h_5 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					 
					 <tr>
					  <th scope="row", div class="col-2">Junio</th>
					  
					   <td> 
					  <?php
							echo '<input name="s_6" type="number" value="' .$s_6 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_6" type="number" value="' .$h_6 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					
					<tr>
					  <th scope="row", div class="col-2">Julio</th>
					 
					   <td> 
					  <?php
							echo '<input name="s_7" type="number" value="' .$s_7 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_7" type="number" value="' .$h_7 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					 
					 <tr>
					 <th scope="row", div class="col-2">Agosto</th>
					 
					   <td> 
					  <?php
							echo '<input name="s_8" type="number" value="' .$s_8 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_8" type="number" value="' .$h_8 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					 
					 <tr>
					  <th scope="row", div class="col-2">Septiembre</th>
					  
					   <td> 
					  <?php
							echo '<input name="s_9" type="number" value="' .$s_9 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_9" type="number" value="' .$h_9 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					 
					 <tr>
					  <th scope="row", div class="col-2">Octubre</th>
					 
					   <td> 
					  <?php
							echo '<input name="s_10" type="number" value="' .$s_10 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_10" type="number" value="' .$h_10 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					
					<tr>
					  <th scope="row", div class="col-2">Noviembre</th>
					 
					   <td> 
					  <?php
							echo '<input name="s_11" type="number" value="' .$s_11 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_11" type="number" value="' .$h_11 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
					
					<tr>
					  <th scope="row", div class="col-2">Diciembre</th>
					  
					   <td> 
					  <?php
							echo '<input name="s_12" type="number" value="' .$s_12 . '" min="0" />'."\n";
						?>
					   </td>
					   
					   <td> 
					  <?php
							echo '<input name="h_12" type="number" value="' .$h_12 . '" min="0" />'."\n";
						?>
					   </td>
					  
					</tr>
				  </tbody>
				</table>
			<div class="container">
			  <div class="row">
				<div class="col-md-auto">
					<div class="form-group mb-2">
					<label for="nombre">Nombre Cotizacion</label>
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Cotizacion" required>
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Guardar</button>					
				
				</div>
				<div id ="calculo" class="col d-flex justify-content-center" style="visibility: hidden">
				  <div id = "card-resultado" class="card text-white bg-primary mb-3 mt-3" style="max-width: 30rem;">
					  <div class="card-header">Resultado</div>
					  <div class="card-body">
						<h5 id ="titulo" class="card-title"></h5>
						<p id = "texto" class="card-text"></p>
					  </div>
					</div>
				</div>
				
			  </div>
			</div>
			</form>
						<div class="d-grid mx-auto mt-1">
                            <button onclick= "calcular()" class="btn btn-outline-primary" type="submit">Calcular</button>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    </body>

    

    
</html>

<script>

function calcular(){
	
	s = [];
	h = [];
	for (var i = 1; i<=12; i++){
		 s[i-1] = document.getElementsByName("s_"+i)[0].value;
		 h[i-1] = document.getElementsByName("h_"+i)[0].value;
	}
	
	for (var i = 0; i< 12; i++){
		s[i] = parseInt(s[i]);
		h[i] = parseInt(h[i]);
		if (Number.isNaN(s[i])){
			s[i] = 0;
		}
		if (Number.isNaN(h[i])){
			h[i] = 0;
		}
	}
	//datos de tablas
	var max_gastos_presuntos = 9185220;
	var tramos = [8266698,18370440,30617400,42864360,55111320,73481760,189827880,2147000000];
	var factores = [0,0.04,0.08,0.135,0.23,0.304,0.35,0.4];
	
	var sum_sueldos = s.reduce((partialSum, a) => partialSum + a, 0);
	var sum_honorarios = h.reduce((partialSum, a) => partialSum + a, 0);
	
	var gastos_presuntos = sum_honorarios*0.3;
	if (gastos_presuntos > max_gastos_presuntos){
		gastos_presuntos = max_gastos_presuntos;
	}
	
	var base_global = sum_sueldos + sum_honorarios - gastos_presuntos;
	var tramo;
	for (var i = 0; i<tramos.length; i++){
		if (base_global <= tramos[i]){
			tramo = i;
			console.log("tramo: "+i);
			break;
		} 
	}
	var rebaja = 0;
	if (tramo != 0){
		rebaja = (tramos[tramo-1]+0.01)*factores[i];
		console.log("rebaja: "+rebaja);
	}
	//cambiar texto carta
	var a_pagar = Math.round(base_global*factores[i] - rebaja);
	console.log("a pagar: "+a_pagar);
	//hacer visible la carta azul con resultados
	var titulo = "";
	var texto = "";
	if ( tramo != 0){
		if (a_pagar >= 0) {
		titulo = "Paga Impuestos"
		texto = "Debera pagar un total de : "+a_pagar+ " pesos."
		if ($('#card-resultado')[0].classList.contains("bg-primary")){
			$('#card-resultado')[0].classList.remove("bg-primary");
		}
		if (!$('#card-resultado')[0].classList.contains("bg-danger")){
			$('#card-resultado')[0].classList.add("bg-danger");
		}
	}else{
		titulo = "Recibe Devolucion"
		texto = "Recibira devolucion de : "+(-1*a_pagar)+ " pesos."
		if ($('#card-resultado')[0].classList.contains("bg-danger")){
			$('#card-resultado')[0].classList.remove("bg-danger");
		}
		if (!$('#card-resultado')[0].classList.contains("bg-primary")){
			$('#card-resultado')[0].classList.add("bg-primary");
		}
	}
	}else{
		titulo = "Recibe Devolucion"
		texto = "Recibira devolucion de : "+Math.round(sum_sueldos*0.1)+ " pesos."
		if ($('#card-resultado')[0].classList.contains("bg-danger")){
			$('#card-resultado')[0].classList.remove("bg-danger");
		}
		if (!$('#card-resultado')[0].classList.contains("bg-primary")){
			$('#card-resultado')[0].classList.add("bg-primary");
		}
	}
	
	$('#titulo')[0].innerText = titulo;
	$('#texto')[0].innerText = texto;
	
	if ($('#calculo')[0].style.visibility != "visible"){
		$('#calculo')[0].style.visibility = "visible";
	}
	//console.log(sum_sueldos);
	//console.log(sum_honorarios);
	
	
};

</script>
