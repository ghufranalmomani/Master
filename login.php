<?php
session_start();
include_once('connect.php');

if (isset($_POST['submit'])){
    $Email =$_POST['email'];
    $Password= $_POST['Password'];

    $Password=md5($Password);

    $sql1="SELECT * FROM user;";
    $result= mysqli_query($conn , $sql1);
    $result_check= mysqli_num_rows($result);

    if ($result_check > 0) {
         while ($row=mysqli_fetch_assoc($result)) {
          if($Email== ($row['email'])&& $Password== $row['pass'] && $row['is_admin']==0){
          

            header('location:LandingPage.php?id='.$row["user_id"].'');

          }else {
           
                  $wrong1= '<style type="text/css">
                  #i11, #one1{
                      display: inline;
                  }
                  </style>';
                  $wrong2= '<style type="text/css">
                  #i22, #two2{
                      display: inline;
                  }
                  </style>';
            
              } 
  }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <script src="https://kit.fontawesome.com/7b836f378e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./CSS/login.css">
  <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
  
  <title> LOG IN form</title>


  
</head>
<body>
<nav>
<div>
                <img width="100px" src="./Images/logo.png">
            </div>
        <div class="tab1">
            <a href="landingpage.php">Home</a>
            <a href="ProductsPage.php">Shop</a>
            <a href="contactUS.php">Contact Us</a>
            <a href="aboutUS.php">About Us</a>
        </div>
        <div class="tab2">
            <a href="signup.php">Register</a>
        </div>
    </nav>




  <section id="intro">
    <div class="container">
      <div class="left-col">
        
        
      </div>
      <div class="right-col">
        
        <div class="form-container">
          <form  method="post">
            <h1 class= "h1">LOGIN</h1>
            <div class="field-group">
          
            <div class="field-group">
              <label for="Email">Email Address</label><br>
              <input name='email' id="Email" value="" type="email"  required="true">
              <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='i11'>
              <p class="error-text" id='one1'>Invalid email</p>
              <?php if(isset($wrong1)){echo $wrong1;}?>               
            </div>
            <div class="field-group">
              <label for="password">Password </label><br>
              <input name='Password' id="password" value="" type="password"  required="true">
              <img src="./img/icon-error (1).svg" class="error-icon" alt="" id='i22'>
              <p class="error-text" id='two2'>wrong password</p> 
              
              <?php if(isset($wrong2)){echo $wrong2;}?>              
            </div>
          
            <input type="submit" value='LOGIN' name='submit' id='login'> 
            <p class="form-footer">By clicking the button, you are agreeing to our <span>Terms and Services</span></p>
          </form>
        </div>
        
      </div>
    </div>
  </section>

  <footer>
    <div id="footerdiv">
        <div class="col-3">
            <img src="./Images/logo.png">
        </div>
        <div class="col-3">
            <h1 style="text-align: center;">Follow Us</h1><br>
            <h2 style="text-align: center;"></h2>
            <p style="text-align: center;" >
            <a href="https://www.facebook.com/FlowardCo/" target="_blank" ><i class="fa-brands fa-facebook"style="display: inline;"></a></i>
            <a href="https://www.instagram.com/flowardco/" target="_blank" ><i class="fa-brands fa-instagram"style="display: inline;"></a></i>
            <a href="https://www.linkedin.com/company/flowardco/" target="_blank" ><i class="fa-brands fa-linkedin"style="display: inline;"></a></i>
            <br>
            <p style="text-align: center;">copyright <i class="fa-solid fa-copyright"></i> 2022 JustForYou</p>
        </div>
        <div class="col-3">
        <h1>Our Website</h1>
       
<p>Our full range covers all your gifting needs from the best floral arrangements to the highest quality gifts, that suit any occasion.
 
</p>
    </div>
            </div>
    </footer>
</body>
</html>