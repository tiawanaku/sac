<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
		<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">

    	<title>Administracion Cementerios</title>
    	<link rel="icon" href="images/logo.png">
	</head>
	<body data-spy="scroll" data-target=".navbar" data-offset="50">
	  	<div id="Welcome">
	  		<!---Start navigation Bar -->
	    	<nav class="navbar navbar-expand-lg navbar fixed-top  navbar-light bg-light">
		 		<a class="navbar-brand" href="#Welcome">
    				<img src="images/logo.png" width="50" height="50" class="d-inline-block" alt=""> Cementerios El Alto
		 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    		<span class="navbar-toggler-icon"></span>
		 		</button>
			  	<div class="collapse navbar-collapse" id="navbarText">
			    	<ul class="navbar-nav ml-auto">
			      		<li class="nav-item">
			        		<a class="nav-link" href="/admin">Administracion</a>
							<a class="nav-link" href="/consulta">Consulta</a>
			      		</li>
					    <!--- <li class="nav-item">
					    	<a class="nav-link" href="#Restaurant">Restaurant</a>
					    </li>
					    <li class="nav-item">
					    	<a class="nav-link" href="#Menu">Menu</a>
					    </li>
					    <li class="nav-item">
					    	<a class="nav-link" href="#Reservation">Reservation</a>
					    </li>
					    <li class="nav-item">
					    	<a class="nav-link" href="#OurLocation">Our Location</a>
					    </li>
					    <li class="nav-item">
					    	<a href="it/index.html" class="language" rel="it-IT"><img src="images/italy.ico" class="flag" alt="Italiano" /></a>
					    	<a href="index.html" class="language" rel="en-En"><img src="images/english.ico" class="flag" alt="English" /></a>
					    </li> -->
				    </ul>
				</div>
			</nav>
			<!--- End Navigation Bar -->
			<!--- Start Carousel -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
				    	<img class="d-block w-100 img-fluid img-slider" src="images/slider1.jpg" alt="First slide">
				    	<div class="carousel-caption">
						    <h2>Cementerio Mercedario</h2>
							<p>...</p>
						</div>
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100 img-fluid img-slider" src="images/slider2.jpg" alt="Second slide">
				      	<div class="carousel-caption">
						    <h2>Cementerio Tarapaca</h2>
							<p>...</p>
						</div>
				    </div>
				    <div class="carousel-item">
				      	<img class="d-block w-100 img-fluid img-slider" src="images/slider3.jpg" alt="Third slide">
				      	<div class="carousel-caption">
						    <h2>Cementerio Villa Ingenio</h2>
							<p>...</p>
						</div>
				    </div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Atras</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Siguiente</span>
				</a>
			</div>
		</div>
			<!--- End of Carousel -->
			<!--- Restaurant-->
		<div class="container">
		 	<div class="row" id="Restaurant">
	    		<div class="col navMenu">
	     		 	<h2 class="text-center" >~ Cementerio Mercedario ~</h2>
	    		</div>
  			</div>
  			<div class="row bg-light" >
  				<div class="col-md-6">
  					<h3>Zona Mercedario</h3>
  					<p>Recientemente remodelado el cementerio mercedario brinda seguridad y comodidad a todos los visitantes.</p>
  					<h5>Trabajando Constantemente</h5>
  					<p>en constante crecimiento estamos en continuo trabajo de refaccion y remodelado.</p>
  				</div>
  				<div class="col-md-6" data-aos="fade-up">
  					<img class="img-fluid" src="images/slider1.jpg">
  				</div>
  			</div>
  			<div class="row bg-light"><br></div>
  			<div class="row bg-light">
  				<div class="col-md-6 order-md-1 order-2" data-aos="fade-up">
  					<img class="img-fluid " src="images/slider2.jpg">
  				</div>
  				<div class="col-md-6 order-md-12 order-1">
  					<h3>Cementerio Tarapaca</h3>
  					<p>ubicado en el corazon de el alto y brindando servico desde 1980.</p>
  					<h5>ubicacion</h5>
  					<p>en pleno centro alteño brinda constante servicio.</p>
  				</div>
  			</div>
  			<!--- End of Restaurant -->
  			<!--- Start of Menu-->
			<div class="row" id="Menu">
				<div class="col navMenu">
	     		 	<h2 class="text-center" >~ Servicios ~</h2>
				</div>
			</div>
			<div class="row bg-light">
				<div class="col-md-4" data-aos="slide-up">
					<div class="card view zoom">
  						<img class="card-img-top img-fluid " src="images/servicio1.jpg">
					  	<div class="card-body">
					  		<h5 class="card-title">~ Inhumacion ~</h5>
					    	<ul class="list-group list-group-flush">
							    <li class="list-group-item">Requisito1</li>
							    <li class="list-group-item">Requisito2</li>
							 	<li class="list-group-item">Requisito3</li>
							 	<li class="list-group-item">Requisito4</li>
							 	<li class="list-group-item">Requisito5</li>
							</ul>
					  	</div>
					</div>
				</div>
				<div class="col-md-4" data-aos="slide-up">
					<div class="card">
  						<img class="card-img-top img-fluid " src="images/servicio2.jpg">
					  	<div class="card-body">
					  		<h5 class="card-title">~ Exhumacion ~</h5>
					    	<ul class="list-group list-group-flush">
								<li class="list-group-item">Requisito1</li>
							    <li class="list-group-item">Requisito2</li>
							 	<li class="list-group-item">Requisito3</li>
							 	<li class="list-group-item">Requisito4</li>
							 	<li class="list-group-item">Requisito5</li>
							</ul>
					  	</div>
					</div>
				</div>
				<div class="col-md-4" data-aos="slide-up">
					<div class="card">
  						<img class="card-img-top img-fluid" src="images/servicio3.jpg">
					  	<div class="card-body">
					  		<h5 class="card-title">~ Renovacion ~</h5>
					    	<ul class="list-group list-group-flush">
								<li class="list-group-item">Requisito1</li>
							    <li class="list-group-item">Requisito2</li>
							 	<li class="list-group-item">Requisito3</li>
							 	<li class="list-group-item">Requisito4</li>
							 	<li class="list-group-item">Requisito5</li>
							</ul>
					  	</div>
					</div>
				</div>
			</div>
			<!--- End of Menu -->
			<!--- Start of Reservation
			<div class="row" id="Reservation">
				<div class="col navMenu">
	     		 	<h2 class="text-center">~ Reservation ~</h2>
				</div>
			</div>
			<div class="row">
				<div class=" col-lg-12 reserve-container" data-aos="fade-up">
					<img class="img-fluid image-reserve" src="images/reserve.jpg">
					<div class="reserve-text col-lg-12 ">
						<h1 class="text-center">Timetables</h1>
						<div class="row">
							<div class="col-6">
							   	<h2 class="text-center">Lunch</h2>
							    <h5 class="text-center">12:00 - 15:00</h5>
							</div>
							<div class="col-6">
							    <h2 class="text-center">Dinner</h2>
							    <h5 class="text-center">19:30 - 23:30</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row bg-light">
				<div class="col">
					<form>
						<div class="form-row">
						  	<div class="form-group col-6">
						  		<h3>Reserve</h3>
						  		<label for="inputDate"> Date</label>
						  		<input type="date" class="form-control" id="inputDate" placeholder="Data gg/mm/aaaa">
						  	</div>
						  	<div class="form-group col-6">
						  		<h3>Details</h3>
						  		<label for="inputName"> Name</label>
						  		<input type="text" class="form-control" id="inputName" placeholder="Name">
						  	</div>
						  	<div class="form-group col-6">
						  		<label for="inputTime"> Timetables</label>
						  		<input type="time" class="form-control" id="inputTime" placeholder="Timetables">
						  	</div>
						  	<div class="form-group col-6">
						  		<label for="inputEmail"> Email</label>
						  		<input type="email" class="form-control" id="inputEmail" placeholder="Email">
						  	</div>
						  	<div class="form-group col-6">
						  		<label for="inputNumber"> Number of Guests</label>
						  		<input type="number" class="form-control" id="inputNumber" placeholder="Number of Guests">
						  	</div>
						  	<div class="form-group col-6">
						  		<label for="inputCel"> Phone</label>
						  		<input type="tel" class="form-control" id="inputCel" placeholder="Phone">
						  	</div>
  							<div class="form-group col-12">
  								<label for="inputComment"> Further requests</label>
								<textarea class="form-control" rows="4" id="inputComment" placeholder="Further requests"></textarea>
							</div>
					 	</div>
						<div class="row">
					  		<div class="col-md-4 col-md-offset-4">
					  			<button type="submit" class="btn btn-secondary btn-block">Reserve</button>
					  		</div>
					  	</div>
					</form>
				</div>
			</div> -->
			<!--- End of Reserve -->
			<!--- Start of Our Location -->
			<div class="row" id="OurLocation">
				<div class="col navMenu">
					<h2 class="text-center">~ Ubicacion ~</h2>
				</div>
			</div>
			<div class="row">
				<div id="map" class="col-md-9 map"></div>
				<div class="col-md-3">
					<h3>Direccion:</h3>
					<p>El Alto, La Paz, Bolivia </p>
					<h3>Email:</h3>
					<p>admin@Elalto.com</p>
				</div>
			</div>
			<!--- End of Our Location -->
			<div class="row footer bg-light">
				<div class="col">
					<p class="text-center">Follow us: <a class="social-icon" href="https://www.facebook.com/rubiktechnologiesShpk/"><i class="fab fa-facebook"></i></a> <a class="social-icon" href="https://www.instagram.com/rubiktechnologies/"><i class="fab fa-instagram"></i></a></p>
				</div>
				<div class="col">
					<p class="text-center">Copyright &copy; 2024</p>
				</div>
				<div class="col">
					<p class="text-center">Desarrollado por : <a href="https://rubik-technologies.com/">Unidad de Sistemas</a></p>
				</div>
			</div>
		</div>
		<footer class="container">
			<div class= "row only-mobile">
				<div class="col-6">
					<a class="btn btn-primary btn-block text-center" href="tel:++390000000"><i class="fa fa-phone" aria-hidden="true"></i> Call</a>
				</div>
				<div class="col-6">
					<a class="btn btn-success btn-block text-center" href="https://api.whatsapp.com/send?phone=+390000000"><i class="fab fa-whatsapp" aria-hidden="true"></i> Whatsapp</a>
				</div>
			</div>
		</footer>
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script type="text/javascript" src="js/map.js"></script>
		<script type="text/javascript" src="js/smooth-scroll.js"></script>
		<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
		<script type="text/javascript" src="js/image-effect.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFZjOV0KA68G2YAh-rn7I3qKqCQEh_Ja0&callback=myMap">
	    </script>
  	</body>
</html>

