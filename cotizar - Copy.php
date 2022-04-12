<?php

include_once "views/navbar-header.php";

require 'vendor/autoload.php';

$collectionPosts = $client->redsocial->posts;
$collectionUsers = $client->redsocial->usuarios;
$collectionComments = $client->redsocial->comments;
date_default_timezone_set('America/Santiago');

$posts = $collectionPosts->find([], ['sort' => ['datetime' => -1]]);
?>
    <body>
    <!--<button onclick= "actualizar()" class="btn btn-outline-primary" type="submit">Actualizar</button> -->
    <div class ="row">
        <div class = "container col-sm-7">
            <div class = "card my-4">
                <div class = "card-body mx-2">
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
	  <form>
	   <td> 
	  <input name="s_1" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_1" type="number" value="0" min="0"/>
	   </td>
	  </form>
   </tr>
  
  <tr>
      <th scope="row", div class="col-2">Febrero</th>
     <form>
	   <td> 
	  <input name="s_2" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_2" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
  
    <tr>
	  <th scope="row", div class="col-2">Marzo</th>
      <form>
	   <td> 
	  <input name="s_3" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_3" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	 
	 <tr>
      <th scope="row", div class="col-2">Abril</th>
      <form>
	   <td> 
	  <input name="s_4" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_4" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	
	<tr>
      <th scope="row", div class="col-2">Mayo</th>
     <form>
	   <td> 
	  <input name="s_5" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_5" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	 
	 <tr>
      <th scope="row", div class="col-2">Junio</th>
      <form>
	   <td> 
	  <input name="s_6" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_6" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	
	<tr>
      <th scope="row", div class="col-2">Julio</th>
     <form>
	   <td> 
	  <input name="s_7" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_7" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	 
	 <tr>
  	 <th scope="row", div class="col-2">Agosto</th>
     <form>
	   <td> 
	  <input name="s_8" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_8" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	 
	 <tr>
      <th scope="row", div class="col-2">Septiembre</th>
      <form>
	   <td> 
	  <input name="s_9" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_9" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	 
	 <tr>
      <th scope="row", div class="col-2">Octubre</th>
     <form>
	   <td> 
	  <input name="s_10" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_10" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	
	<tr>
      <th scope="row", div class="col-2">Noviembre</th>
     <form>
	   <td> 
	  <input name="s_11" type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_11" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
	
	<tr>
      <th scope="row", div class="col-2">Diciembre</th>
      <form>
	   <td> 
	  <input name="s_12"  type="number" value="0" min="0"/>
	   </td>
	   <form>
	   <td> 
	  <input name="h_12" type="number" value="0" min="0"/>
	   </td>
	  </form>
    </tr>
  </tbody>
</table>
			<div class="container">
			  <div class="row">
				<div class="col">
				<iframe name="guardar" style="display:none;"></iframe>
				<form action="/html/guardar_cotizacion.php" method="post" target="guardar">
					<input type="hidden" name="ad_id" value="2">    
					<div class="form-group mb-2">
					<label for="nombre">Nombre Cotizacion</label>
					<input type="text" class="form-control" id="nombre" aria-describedby="nombreCotizacion" placeholder="Nombre Cotizacion" required>
				  </div>
				  <button type="submit" class="btn btn-primary mb-2" onclick= "save()">Guardar</button>					
				</form>
				</div>
				<div class="col">
				  
				</div>
				<div class="col">
				  
				</div>
			  </div>
			</div>
						<div class="d-grid mx-auto mt-1">
                            <button class="btn btn-outline-primary" type="submit">Calcular</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>

    

    
</html>

<script>

$(".delete-post").click(function(event){
    console.log("delete post");
});
function save()
{	
	var name = document.getElementById("nombre").value;
	if (name == ""){
		return;
	}
	var s;
	var h;
	console.log(name);
	for (var i = 1; i<12; i++){
		 s = document.getElementsByName("s_"+i)[0].value;
		 h = document.getElementsByName("h_"+i)[0].value;
		 console.log(i + " " + s + " " + h);
	}
    

}
function actualizar(){
    $.ajax({
        url: "/posts-ajax.php",
        dataType: "json",
        context: document.body
    }).done(function( data ){
        for ( var post in data){
            console.log(data[post]);
        }
        
        
    });

    };

</script>
