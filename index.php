<?php 

require_once 'dbConfig.php';

// Include URL Shortener library file
require_once 'Shortener.class.php';

// Initialize Shortener class and pass PDO object
$shortener = new Shortener($db);
$error=null;
$short=null;

// Long URL


if(isset($_POST['short'])){
     $longURL = $_POST['short'];
      // Prefix of the short URL 
      $shortURL_Prefix = 'clkze.com/'; // with URL rewrite
     //$shortURL_Prefix = 'https://localhost/short/redirect.php?c='; // without URL rewrite



try{
    // Get short code of the URL
    $shortCode = $shortener->urlToShortCode($longURL);
    $sql= "SELECT long_url FROM short_urls  WHERE short_code = '$shortCode' LIMIT 1";
    $stmt=$db->query($sql);
     while($DataRows = $stmt->fetch()){
        
        
            $url=$DataRows["long_url"];
         
     }
   
    // Create short URL
    $shortURL = $shortURL_Prefix.$shortCode;
    // Display short URL
    $short = $shortURL;

    

}catch(Exception $e){
    // Display error
    
        $error="<div class=\"alert alert-danger\">";
        $error .= htmlentities($e->getMessage());
        $error .= "</div>";
}
}





?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
    
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       

           <a class="navbar-brand" href="http://clkze.com/">
          <img src="clkze.png" alt="">
        </a>
        
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="http://clkze.com/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Report Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

    
<?php echo  $error; ?>

    <form method="post" action=""> 
        <div class="container py-4 mb-4">
        <div class="row">
       <div class="offset-lg-1 col-lg-10">
    
        <div class="card">
            <div class="card-body">
         <div class="form-group">
         <div class="card-body">
             <h5 class="card-title" style="text-align:center;">Paste the URL to be shortened</h5>
                 
                 
                   <div class="input-group">
                 
                 <input type="text" class="form-control" name="short" placeholder="Enter long url">
                       <div class="input-group-append">
                <button type="submit" class="btn btn-primary" name="submit">Shorten Url</button><br>
                     </div>
                 </div><br>
                 <small><p style="text-align:center;">ShortURL.at is a free tool to shorten a URL or reduce a link.
                     Use our URL Shortener to create a shortened link making it easy to remember.</p></small>
             </div>
         </div>
         </div>
        </div>
        </div>
        </div>
        </div>
    </form>
        
        <br>
        
<div class="container py-4 mb-4">
        <div class="row">
       <div class="offset-lg-1 col-lg-10">
           
        
    
        
        <?php
       

     
        if(!$error && isset($_POST['short'])){
         
       
            $shorts = "<div class=\"card\">";
            $shorts .= " <div class=\"card-body\" >";
            $shorts .= " <div class=\"form-group\">";
            $shorts .= "<div class=\"card-body\">";
            $shorts .="<h5 class=\"card-title\" style=\"text-align:center;\">Your shortened URL</h5>";
            $shorts  .="<div class=\"input-group\">";
            $shorts .="<input class=\"form-control\" type=\"text\" value=\"$short\" id=\"myInput\" width=\"48\" height=\"48\">"; 
            $shorts .="<div class=\"input-group-append\">";
            $shorts .="<button class=\"btn btn-primary\" onclick=\"myFunction()\">Copy text</button>";
            $shorts .= "</div>";
            $shorts .= "</div>";
             $shorts .= "<br>";
            $shorts .= "<p>Long url:-- <a href=$url>$url</a></p>" ;
            $shorts .= "<small><p style=\"text-align:center;\">Track the total of clicks in real-time from your shortened URL.
                                                </p></small>";
            $shorts .= "</div>";
            $shorts .= "</div>";
            $shorts .= "</div>";
            $shorts .= "</div>";
         
       
            echo  $shorts;
            
            
        
        }
    
                ?>
        
            </div>
    </div>
    </div>
            
            
            <br>
            <br>
        
          <footer class="bg-dark text-white">
<div class="container">
    <div class="row">
        <div class="col-md-12">
    
    <p class="text-centre">Theme By| Ashish|&copy right Reserved</p>
    
    </div>
        </div>
    
    </div>
</footer>
            
            <script>function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
 </script>
           
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
        
</html>

    
    

