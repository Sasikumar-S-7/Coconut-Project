<?php?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
body {
  font-family: 'Source Sans Pro',sans-serif;
}
#navs {
  text-shadow: 1px 1px #63ed5c;
  padding-left: 5px;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-sm "style="background-color: ;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="rounded-pill" src="images/lg.png" alt=" coconut logo" width="80%"></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href='index.php'>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href="">About Us </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href='wholeseller.php'>Whole Seller</a>
        </li>    
         <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href='customer.php'>Customer</a>
        </li>   
         <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href="contact.php">Contact Us</a>
        </li>   
         <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href="gallery.php"></a>
        </li>  
         <li class="nav-item">
          <a class="nav-link text-black fs-5" id="navs" href='admin.php'>Admin</a>
        </li> 
        <li class="nav-item ps-5 pt-1">
        <form class="d-flex">
        <input style="border-radius: 0px;" class="form-control" type="text" placeholder="Search">
        <button style="border-radius: 0px;" class="btn btn-success" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form> 
    </li>
      </ul>
    </div>
  </div>
</nav>
<?php?>