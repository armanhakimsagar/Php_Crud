
<?php


include("function.php");

// check insert button



if(isset($_POST['submit'])){

	json_decode(file_get_contents("php://input"));

    $name = $_POST['name'];

    $sql = "insert into abc values('','$name')";

	$insert = project_Insert::insert($sql);	

}




// check view button


if(isset($_POST['view'])){

  require("vendor/autoload.php");

  $client = new GuzzleHttp\Client();

  // error handle
  
  try {

	   $res = $client->get('http://localhost/oop/api.php');    
  }
  catch (GuzzleHttp\Exception\ClientException $e) {

      $response = $e->getResponse();
      //echo $responseBodyAsString = $response->getBody()->getContents();
      echo 'Uh oh! ' . $e->getMessage();
  }


    // for get all data file

  $res = $client->request('GET', 'http://localhost/oop/api.php',[

      'headers' => [
            'Accept'     => 'application/json',
            'Content-type' => 'application/json'
        ]

  ]);


  	// for get all data 
  	$data = json_decode($res->getBody(), TRUE);

  	foreach ($data as $datas){
				
		echo $datas['name'];

	};

}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <input type="text" name="name">
	<input type="submit" name="submit" value="submit">
    <input type="submit" name="view" value="view">

</form>

 
