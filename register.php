<?php
require ('database.php');
// If form submitted, insert values into the database.
if (isset($_POST['email']))
{

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    if ($password == $confirmpassword)
    {
        $selectemail = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '" . $email . "'") or exit(mysqli_error($conn));
        if (mysqli_num_rows($selectemail))
        {
            echo '<script>alert("This email is already being used")</script>';
        }

        $selectuser = mysqli_query($conn, "SELECT `user_name` FROM `users` WHERE `user_name` = '" . $_POST['username'] . "'") or exit(mysqli_error($conn));

        if (mysqli_num_rows($selectuser))
        {
            echo '<script>alert("This username is already being used")</script>';
        }
        else if ((!mysqli_num_rows($selectemail))&&(!mysqli_num_rows($selectuser)))
        {
         
        $sql = "INSERT INTO `users` (`user_ID`, `user_name`, `password`, `name`, `lastname`, `email`) VALUES (NULL,'$username', '$password', '$name','$lastname','$email')";
           if ($conn->query($sql) === true)
            {
                sleep(3);
                session_start();
                $_SESSION["user_name"] = $username;
                header("location:index.php?status=success");
            }
            else
            {
                session_start();
                $_SESSION["user_name"] = $username;
                header("location:index.php?status=failure");
            }

            $conn->close();
        }
    }

    else
    {
        echo "<div style='color:white;'><h3>Passwords do not match.</h3></div>";
    }
}

if (isset($_POST['username']))
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE user_name = '$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);

    if ($rows == 1)
    {
        session_start();
        $_SESSION["user_name"] = $username;
        header("location:index.php?status=login");
    }
    else
    {
        echo "<div class='form'><h3>Username/password is incorrect.</h3></div>";
    }
}

?>


<!DOCTYPE html>
<html lang="gr">
   <head>
      <title> Movie World | Register </title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- BEGIN OF FAVICON ICON -->
      <link rel="shortcut icon" href="./assets/images/favicon.png"/>

      <!-- BEGIN OF CSS STYLES REFFERENCE -->
      <link rel="stylesheet" href="./assets/css/styles.css">
      <link rel="stylesheet" href="./assets/css/bootstrap-icons.css">
      <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
      <!-- BEGIN OF JACASCRIPT REFFERENCE -->
      <script type="text/javascript" src="./assets/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="./assets/js/jquery-3.3.1.min.js"></script>
   <script type="text/javascript" src="./assets/js/jquery.cookiebar.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

   </head>
   <body>
 <!-- Show/call cookie bar -->
   <script src="./assets/js/call_cookie.js"></script> 
    <center>
    <div class="main_container">
      <div class="home_locator">
        <a href="./index.php"><i class="fa fa-angle-double-left"></i><i class="fa fa-home"></i> Return to home</a>
      </div>
         
         <div style="border-bottom: solid #edeff0 3px;">
            <p id="page_header">
               Register
            </p>
         </div>
         <br><br>

      <form  class="form_login" action="" method="post" name="register">
         <div class="container">
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" required>
            <label for="lastname"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Lastname" name="lastname" id="lastname" required>
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
            

            <label for="password"><b>Password</b></label>
            <input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <i class="bi bi-eye-slash" id="togglePassword"></i>
            
            <label for="confirmpassword"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="confirmpassword" id="confirmpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <i class="bi bi-eye-slash" id="togglePassword_confirm"></i>

            <div id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>

            <hr>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <input class="registerbtn" name="submit" type="submit" value="Create" />
            <!--<button type="submit" class="registerbtn">Register</button> -->
         </div>
         <div class="container signin">
            <p>Already have an account? <a id='myBtn' style='text-decoration: none;cursor:pointer;'>Sign in</a>.</p>
         </div>
          </form>
          <!-- The Modal -->
          <?php
echo '
               
                    <!-- The Modal -->
                      <div id="myModal" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content">
                          <center>
                            <span class="close">&times;</span>
                            <p style="font-weight:bold;font-size:1.3vw;"> Please Login with your credentials </p>
                                           <form class="form_login" action="" method="post" name="login" >
                            <table class="form-table">
                               <tr class="form-table-row">
                                  <td class="form-table-cell-left" style="background-color: #04AA6D;border-top-left-radius: 3px;border-bottom-left-radius: 3px;color:white;text-align: center;">
                                     <i class="fa fa-user"></i>
                                  </td>
                                  <td class="form-table-cell-right">
                                     <input style="outline: none;border-bottom:solid #04AA6D 2px;border-left:none;border-top:none;border-right: none;" class="form_login_input" type="text" name="username" placeholder="Username" required />
                                  </td>
                               </tr>

                               <tr class="form-table-row"> 
                                  <td class="form-table-cell-left" style="background-color: #04AA6D;border-top-left-radius: 3px;border-bottom-left-radius: 3px;color:white;text-align: center;">
                                     &nbsp;&nbsp;<i class="fa fa-key"></i>&nbsp;&nbsp;
                                  </td>
                                  <td class="form-table-cell-right">

                                     <input style="outline: none;border-bottom:solid #04AA6D 2px;border-left:none;border-top:none;border-right: none;" class="form_login_input" type="password" name="password" placeholder="Password" required />
                                  </td>
                               </tr>

                               <tr>
                                  <td colspan="2">
                                     <center><input style="background-color: #04AA6D; color: white; padding: 1em 1em;width: 100%; margin: 1em 0;font-weight: bold; border: none; cursor: pointer; opacity: 0.9;" name="submit" type="submit" value="Login" /></center>
                                  </td>
                               </tr>
                               
                            </table>                   
                            
                         </form>';

echo "           <p>Don't have an account yet? <a href='./register.php' style='text-decoration: none;font-weight: bold;'>Sign Up</a></p>
                          </center>
                        </div>
                      </div>";
?>
      </center>
      <script>
                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                  modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                  modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                  if (event.target == modal) {
                    modal.style.display = "none";
                  }
                }
            </script>


      <div class="footer">
           <table class="ft-inner-table">
             <tr>
               <td class="ft-left-panel">Copyrights @ <a class="cb" href="https://codebrakes.gr/" target="_blank"> Codebrakes.gr - 2021 </a></td>
               <td class="ft-right-panel">
                  <a href="#">Terms</a> 
                  &nbsp;&nbsp;&nbsp;
                  <a href="#">Privacy</a> 
                </td>
             </tr>
           </table>
          </div>

    </div>
         <script>
      var myInput = document.getElementById("password");
      var letter = document.getElementById("letter");
      var capital = document.getElementById("capital");
      var number = document.getElementById("number");
      var length = document.getElementById("length");

      // When the user clicks on the password field, show the message box
      myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
      }

      // When the user clicks outside of the password field, hide the message box
      myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
      }

      // When the user starts to type something inside the password field
      myInput.onkeyup = function() {
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {  
          letter.classList.remove("invalid");
          letter.classList.add("valid");
        } else {
          letter.classList.remove("valid");
          letter.classList.add("invalid");
        }
        
        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {  
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {  
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }
        
        // Validate length
        if(myInput.value.length >= 8) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }
    </script>

    <script>
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');
      togglePassword.addEventListener('click', function (e) {
          // toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          // toggle the eye / eye slash icon
          this.classList.toggle('bi-eye');
      });

      const togglePassword_confirm = document.querySelector('#togglePassword_confirm');
      const password_confirm = document.querySelector('#confirmpassword');
      togglePassword_confirm.addEventListener('click', function (e) {
          // toggle the type attribute
          const type = password_confirm.getAttribute('type') === 'password' ? 'text' : 'password';
          password_confirm.setAttribute('type', type);
          // toggle the eye / eye slash icon
          this.classList.toggle('bi-eye');
      });
    </script>



   </body>
</html>
