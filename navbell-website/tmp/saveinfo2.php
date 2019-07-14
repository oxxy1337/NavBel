<?php
   if(isset($_POST['submit'])){
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $year = $_POST["year"];
      $email = $_POST["email"];
      $password = $_POST["password"];

      $filename = $_FILES['file']['name'];
      $filetmpname = $_FILES['file']['tmp_name'];
      $filesize = $_FILES['file']['size'];
      $fileerror = $_FILES['file']['error'];//integer '0' means no error
      $filetype = $_FILES['file']['type'];//MIME type string exemple "image/png"

      //$url = "http://35.203.11.145/navbell-api/?tooken=tooken()&op=signin";
      $url = "http://35.203.0.205:2019/?tooken=tooken()&op=signin";

      $data = array(
         "year" => $year,
         "fname" => $fname,
         "lname" => $lname,
         "email" => $email,
         "password" => $password
         //"picture" => $file_base64
      );

      switch($fileerror){
         case 0://no error
            if($filetype == 'image/jpeg'){//checking the mime type
               $image_base64 = file_get_contents($filetmpname);
               $image_base64 = base64_encode($image_base64);

               $data['picture'] = $image_base64;//add image info to the data array

               $data = json_encode($data);

                    $opt = array(
                        'http' => array(
                            'method' => 'POST',
                            'header' => 'Content-type: application/x-www-form-urlencoded',
                            'content' => $data
                        )
                    );
                    $context = stream_context_create($opt);
                    $result = file_get_contents($url, false, $context);

                    $result = json_decode($result);
                    //var_dump($result->reponse);
                    if($result != null){
                       switch($result->reponse){
                          case "0": echo 'you are banned';
                          break;
                          case "1":
                              session_start();
                              //why all this , JUST DO $_SESSION['result'] = $result
                              $_SESSION['fname'] = $result->fname;
                              $_SESSION['lname'] = $result->lname;
                              $_SESSION['email'] = $result->email;
                              $_SESSION['picture'] = $result->picture;
                              $_SESSION['date'] = $result->date;
                              $_SESSION['id'] = $result->id;

                              //redirect to profile.php
                              header('location: profile.php');
                          break;
                          case "2": echo 'you are already subscribed';
                          break;
                          case "3": echo 'you are not from ESI';
                          break;
                          case "-1": echo 'something went wrong';
                          break;
                       }
                    } else {
                       echo '$result = null';
                    }
                    //save reponse in session and redirect to profile.php
                    /*if($result != null){
                     //redirect to profile  remeber he is new the reponse wont have pionts and rank...
                     header('location: profile.php');//no profile should have a relation with the ID fichier profile should be created in the server i guess
                     // second thought profile.php is a file in the server and we show its content by transfering them from saveinfo.php using $_SESSION
                     }
                    */ 
                    
            } else {
               echo 'your image should be in jpg format';
            }
         break;
         case 1:
         case 2:
            echo 'image size is too big';
         break;
         case 4://user didn't choose image, so send default image
               $image_base64 = file_get_contents('profilepicture.jpg');
               $image_base64 = base64_encode($image_base64);

               $data["picture"] = $image_base64;

               $data = json_encode($data);

              $opt = array(
                  'http' => array(
                      'method' => 'POST',
                      'header' => 'Content-type: application/x-www-form-urlencoded',
                      'content' => $data
                  )
              );
              $context = stream_context_create($opt);
              $result = file_get_contents($url, false, $context);

              $result = json_decode($result);
              //var_dump($result);
              if($result != null){
               switch($result->reponse){
                  case "0": echo 'you are banned';
                  break;
                  case "1":
                      session_start();
                      $_SESSION['fname'] = $result->fname;
                      $_SESSION['lname'] = $result->lname;
                      $_SESSION['email'] = $result->email;
                      $_SESSION['picture'] = $result->picture;
                      $_SESSION['date'] = $result->date;
                      $_SESSION['id'] = $result->id;

                      //redirect to profile.php
                      header('location: profile.php');
                  break;
                  case "2": echo 'you are already subscribed';
                  break;
                  case "3": echo 'you are not from ESI';
                  break;
                  case "-1": echo 'something went wrong';
                  break;
               }
            } else {
               echo '$result = null';
            }

              //save reponse in session and redirect to profile.php
              /*if($result != null){
               //redirect to profile  remeber he is new the reponse wont have pionts and rank...
               header('location: profile.php');//no profile should have a relation with the ID fichier profile should be created in the server i guess
               // second thought profile.php is a file in the server and we show its content by transfering them from saveinfo.php using $_SESSION
                }
              */ 

         break;
         default:
         echo 'there was a problem uploadign your image';
      }
   }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Save Info</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="loginbox2">
		<img src="avatar.png" class="avatar">
		<h1>Sign In</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
			<p>First Name</p>
			<input type="text" name="fname" placeholder="First Name">
			<p>Last Name</p>
			<input type="text" name="lname" placeholder="Last Name">
			<p>Year</p>
			<br><select name="year" class="year">//<!-- do we use the (select) name here in php like the (input) name?? -->
			  <option value="">...</option>
			  <option value="1">1 CPI</option>
			  <option value="2">2 CPI</option>
			  <option value="3">1 CS</option>
			  <option value="4">2 CS</option>
			  <option value="5">3 CS</option>
            </select>
            <p>Email</p>
            <input type="text" name="email">
            <p>Password</p>
            <input type="password" name="password">
			<br> <br><p>Choose your profile picture</p>
			<br> <input type="file" name="file">
 			<br><input type="submit" name="submit" value="Save" >
			

		</form>
	</div>

</body>
</html>