<?php
    include("./functions/functions.php");
    include('./pages/resetpwd/code_verification.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Password Reset</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/pw-style.css" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="pw-background">
      <div class="pw-container">
        <img src="img/navlogo.png" width="70" height="30" />

        <div class="form-container ">
          <p>
            Please enter the code that you recieved in your E-mail
          </p>

          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <i class="input-group-text fas fa-unlock"></i>
                </div>

                <input
                  type="text"
                  name="code"
                  class="form-control"
                  placeholder="Enter the code"
                />
              </div>
            </div>

            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <i class="input-group-text fas fa-unlock"></i>
                </div>

                <input
                  type="Password"
                  name="newPassword"
                  class="form-control"
                  placeholder="Enter your new Password"
                />
              </div>
            </div>



            

            <input
              type="submit"
              value="Submit"
              class="btn btn-primary btn-block mt-4"
              name="submit"
            />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
