 <?php
 include('../libs/tmdb-api.php');

    $tmdb = new TMDb();
	$tmdb->setAPIKey('62b6a3666f6e142745e6505efde1ebe0');      
   	$movies = $tmdb->getDiscoverPopularMovies();
	header('Content-Type: application/json');
	echo json_encode($movies);
	?>