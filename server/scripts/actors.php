 <?php
 include('../libs/tmdb-api.php');
 
    $tmdb = new TMDb();
	$tmdb->setAPIKey('62b6a3666f6e142745e6505efde1ebe0');
 
    $postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	$title = $request->name;
      
   	$actors = $tmdb->searchPersonaArray($title);
	header('Content-Type: application/json');
	echo json_encode($actors);
	?>