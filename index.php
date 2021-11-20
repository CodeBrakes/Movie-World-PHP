<?php
error_reporting(E_ALL ^ E_WARNING); 
   //include the class needed for paginator
   require_once 'Paginator.class.php';
   
   //start the session
   session_start();
   
   if ( isset( $_POST['Submit'] ) ) { 
   
    unset($_SESSION['Page']);
    unset($_SESSION['Total']);
   }
   
   
   
   //Establish connection with database
   $conn = new mysqli('127.0.0.1', 'root', '', 'mydb');
   
   
   //set limit of results shown in each page etc.
   $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 25;
   $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
   $links = (isset($_GET['links'])) ? $_GET['links'] : 5;
   
  
   
    if(isset($_SESSION["user_name"])) {

      $sqlsearchforuserid= "SELECT user_ID FROM `users` WHERE user_name='".$_SESSION["user_name"]."'";
 $result = $conn->query($sqlsearchforuserid);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $_SESSION["USER_ID"] = $row['user_ID'];
   setcookie("USER_ID", $row['user_ID']);
  }
}
    } 
   // if a movie name is given, fetch all results that contain part of the name

       if (!isset($_COOKIE["column_to_sort"])){// Get the result...
       $query = "SELECT * FROM movies  ORDER BY postdate desc limit " .($page - 1)* $limit;
       }
       else{
        $query = "SELECT * FROM movies  ORDER BY " . $_COOKIE["column_to_sort"] . " desc limit " .($page - 1)* $limit;
       }
       if(!isset( $_SESSION["Total"])){
       $result = mysqli_query($conn,"SELECT serialNo FROM movies");
       $rowtot = mysqli_num_rows($result);
       $_SESSION["Total"] = $rowtot;
    }    
   
     
      echo $_COOKIE['column_to_sort'];;
   // Some variables we need for the table.
   
   
   //set the paginator
   $Paginator = new Paginator($conn, $query);
   
   //get paginated results
   $results = $Paginator->getData($page, $limit);
   $_SESSION["Page"] = $page;
   
  ?>
<!--start of web page\s GUI-->
<!DOCTYPE html>
<head>
   <title>Movie Infos | Search, add and share your favourite movies </title>
   <link rel="stylesheet" href="./assets/css/styles.css">
   <script type="text/javascript" src="./assets/js/jquery-3.3.1.min.js"></script>
   <script type="text/javascript" src="./assets/js/jquery.cookiebar.js"></script>
</head>
<body>
   <!-- Show/call cookie bar -->
   <script src="./assets/js/call_cookie.js"></script> 
   <div class="main_container">
      <br><br>
      <div style="border-bottom: solid #edeff0 3px;">
         <p id="page_header">
            Welcome to Movies World
         </p>
      </div>
      <br><br>


      <?php
         if(isset($_SESSION["user_name"])) {

           if( $_GET['status'] == 'success'){
              $message = 'User has been created... Click OK to be redirected to the dashboard.';
              echo "<script>alert('$message');</script>";
           }
           else if ($_GET['status'] == 'failure') {
             $message = 'User already exists...';
             echo "<script>alert('$message');</script>";
             session_destroy();
           }
            else if ($_GET['status'] == 'dupvote') {
             $message = 'You have already voted for this movie!';
             echo "<script>alert('$message');</script>";
             
           }
            else if ($_GET['status'] == 'movieposted') {
             $message = 'Movie was succesfully posted!';
             echo "<script>alert('$message');</script>";
             
           }
         
         ?>

      <p style="text-align: right;"> Welcome back <span style="color:#1e90ff;font-weight: bold;"><?php echo $_SESSION["user_name"]; ?></span>. Click here to <a style="color: #1e90ff;text-decoration: none;font-weight: bold;" href="logout.php" tite="Logout">Logout</a>. </p>
      <?php
         }else  
         require('database.php');
        // If form submitted, insert values into the database.

        if (isset($_POST['username'])) {
           
           $username = $_POST['username'];
           $password = $_POST['password'];

           //Checking is user existing in the database or not
           $query = "SELECT * FROM `users` WHERE user_name = '$username' AND password='$password'";
           $result = mysqli_query($conn,$query) or die(mysqli_error());
           $rows = mysqli_num_rows($result);

           if($rows == 1) {
              session_start();
              $_SESSION["user_name"] = $username;
              header("location:index.php?status=login");
           } else {
              echo "<div class='form'><h3>Username/password is incorrect.</h3></div>";
           }
        }
        if (!isset($_SESSION["user_name"])) {
         echo '
         <div style="text-align:right;font-weight:bold;"">
           <a id="myBtn" style="text-decoration: none;cursor:pointer;">Login</a>
               
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
                      </div>
              &nbsp;
              or 
              &nbsp;
              <a href='./register.php' style='outline:none;background-color:#1e90ff;color:white;border:none;padding:0.7% 3% 0.7% 3%;border-radius:6px;text-decoration:none;'>Sign Up</a></div>";
            }
         ?>
         
      <br><br>
      <br><br>
      <!--results table-->

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

          <?php
              
              $result=mysqli_query($conn,"SELECT count(*) as total from movies");
              $data=mysqli_fetch_assoc($result);
              echo '<p> Found '.$data['total'].' movies.</p>';
          ?>

      <div class="flex-container">
        <div class="flex-item-left">
               
            <?php 
             
               //Display the results
               for ($i = 0;$i < count($results->data);$i++) {
                 
                 $user_id = $results->data[$i]['user_ID'];
                  
                 $query = "SELECT name,lastname  FROM `users` WHERE user_ID = '$user_id'";
                 $result = mysqli_query($conn,$query) or die(mysqli_error());

                while($row= mysqli_fetch_array($result))
            {
                  $nameuser = $row['name'];
                  $lastnameuser = $row['lastname'];

             
            }
          
            
                    echo '
                    <div style="border: solid black 4px;border-radius:15px;padding:2%;background-color:white;">
                      <table style="border-collapse: collapse;border:none;">
                        <tr>
                            <td colspan="2" style="text-align:left;font-size: 1.3em;font-weight:bold;">' . $results->data[$i]['Name']        .'</td>
                            <td style="text-align:right;"> Posted '. date('d-m-Y', strtotime($results->data[$i]['postdate']))    .'</td>
                          </tr>
                          <tr>
                            <td colspan="3">'. $results->data[$i]['Description']  .'</td>
                          </tr>
                          <tr> 
                            <td style="text-align:left;"><span style="color:green; font-weight:bold;">' . $results->data[$i]['Likes'] .' likes </span>| <span style="color:red; font-weight:bold;"> '. $results->data[$i]['Hates']  . ' Hates </span> </td>
                            <td>'; 
                          
                            if(isset($_SESSION["user_name"])&& ($results->data[$i]['user_ID']!= $_SESSION['USER_ID'])) {

                          echo '
                              <center> 
                                <a href="updatelikes.php?userName='. $_SESSION["user_name"] . '&movieID=' . $results->data[$i]['serialNo'] . '" style="color:green; font-weight:bold; text-decoration:none;">Do a Like</a> &nbsp;&nbsp;&nbsp; <a href="updatedislikes.php?userName='. $_SESSION["user_name"] . '&movieID=' . $results->data[$i]['serialNo'] . '"style="color:red; font-weight:bold; text-decoration:none;">Do a Dislike</a> 
                              </center>';
                                
                            }
                            
                          echo '</td>
                            <td style="text-align:right;"> Posted by <span style="color: #1e90ff;font-weight: bold;">'.  $nameuser .'  '. $lastnameuser .'</span></td>
                          </tr>
                      </table>
                      </div>
                      <br>'; 
                    
                } 
                                   
               ?>

        </div>
        <div class="flex-item-right">
          <?php
        	if(isset($_SESSION["user_name"])) {
          		echo '<center>
          				<a href="submitMovie.php" class="movie_reg_btn">
          					Submit Movie
          				</a> <br>
          			  </center>';
          	}
          ?>


          <form action="index.php" style="background-color: rgb(219, 219, 219,0.7);padding-bottom: 9%;border-radius: 18px;border: solid black 5px;">
            
            <p style="text-align:center;font-size: 1.3em;font-weight:bold;">Sort by:</p>

            <label class="form-control">
              <input type="radio" name="columnname" value= "Likes"/> &nbsp; &nbsp; Likes 
            </label>

            <label class="form-control">
              <input type="radio" name="columnname" value= "Hates" /> &nbsp; &nbsp; Hates
            </label>

            <label class="form-control">
              <input type="radio" name="columnname"  value= "postdate"  /> &nbsp; &nbsp; Dates
            </label>
          </form>

        </div>
      </div>
      <br>

<script>
    $('input[type="radio"]').on('click', function() {
      document.cookie = 'column_to_sort' + "=" + ($(this).val());
     window.location ="index.php";
});
  </script>

      <ul class="pagination pagination-sm">
         <!-- show the paginator numbers-->
         <?php  $class = 'pagination pagination-sm'; echo $Paginator->createLinks($links, $class); ?> 
      </ul>
   </div>
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
</body>



<script>
   //This is a script that disables the Submit button if all three search fields are empty, and shows the warning to the user as long as the fields are empty.
       function manage(txt) {
           var bt = document.getElementById('search_input_btn');
           var ele = document.getElementsByTagName('input'); 
           var wtxt =document.getElementById('warning_txt');
   
           // Loop through each element.
         
   
               // Check the element type
               if ((ele[0].value == '')&&(ele[1].value == '')&&(ele[2].value == '')) {
                   bt.disabled = true;    // Disable the button.
                   wtxt.style.display = "block";
                   return false;
               }
               else {
                   bt.disabled = false;   // Enable the button.
                    wtxt.style.display = "none";
               }
           
       }    
</script>
</html>