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
        <a href="./index.php?#"><i class="fa fa-angle-double-left"></i><i class="fa fa-home"></i> Return to home</a>
      </div>
         
         <div style="border-bottom: solid #edeff0 3px;">
            <p id="page_header">
               Add movie to the database
            </p>
         </div>
         <br><br>
     <?php
require ('database.php');

if (isset($_POST['submit']))
{

    $title = $_POST['title'];
      $description = mysqli_real_escape_string($conn,$_POST['description']);
    $likes = 0;
    $dislikes = 0;
    $userid = $_COOKIE['USER_ID'];

   
    $sql = "INSERT INTO `movies`(`serialNo`, `Name`, `Description`, `Likes`, `Hates`, `postdate`, `user_ID`) VALUES (NULL,'$title','".mysqli_real_escape_string($conn,$_POST['description'])."','$likes','$dislikes',now(),'$userid')";

    if ($conn->query($sql) === true)
    {
        header('Location: index.php?status=movieposted');
    }
    else
    {

        echo mysqli_errno($conn->query($sql));
    }
    $conn->close();

}
?>
         <div class="cointainer">
          <br><br><br>
            <center>
               <form style="width:100%;" action="" method="post" name="register">
                  <table class="form-table">
                      <tr class="form-table-row">
                        <td class="form-table-cell-right" colspan="2">
                          Movie Title:
                          <input type="text" name="title" id="title" placeholder="Please add the title of the movie" required>
                        </td>
                     </tr>
                     <tr class="form-table-row">
                        <td class="form-table-cell-right" colspan="2">
                           <textarea placeholder="*Please add the description (required)." style ="color:black;resize: vertical;width:50vw; height:20vw;outline: none;border:none;" name="description"  required > </textarea>
                        </td>

                     </tr>
                     <tr class="form-table-row">
                        <td class="form-table-cell-left">
                           <input class="form_create_submit" name="back" style=" float: right;background-color: transparent;outline: none;color:#1e90ff;font-weight: bold;border:none;text-align: center;cursor: pointer;" type="submit" value="Back" onClick="document.location.href='employee-page.php'"/>
                        </td>
                        <td class="form-table-cell-right">
                           <input class="form_create_submit" style="cursor: pointer;" name="submit" type="submit" value="Submit" />
                             
                        </td>
                     </tr>
                  </table>
                  <br><br><br>
               </form>
            </center>
         </div>
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
   </body>
</html>
