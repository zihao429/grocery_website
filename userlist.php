<?php include_once 'includes/session.php'; ?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <!-- CSS Sheet -->
    <link rel="stylesheet" href="styles.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <!--Font Awesome CDN-->
    <script src="https://kit.fontawesome.com/1e07fc90b9.js" crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <title>Userlist | TastyGrocery.com</title>
    <meta name="description" content="The userlist of Grocery.com, home of great online grocery shopping!">
    <link rel="shortcut icon" type="image/png" href="img/favicon-32x32.png">
    
  </head>

  <body>

    <?php include_once 'templates/navbar.php'; ?>
    <?php include_once 'templates/header.php'; ?>

    <div class="page-container">
        <div class="content-wrapper">
            
            <div class="main page-width">
              <!--Main content starts here!-->
              


                <div class="card-content">
                    <h5 class="center-text">User List</h5>
                </div>

                <div class="topbar">
                  <a href="addUser.php" class="btn add custom-button">Add User</a>
                </div>
                <table id ="table">
                    <?php
                        
                        $list = glob('database/users/*.xml');
                      

                        echo '
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Admin</th>
                            
                        </tr>
                        </thead>';
                        for ($i = 0; $i < count($list); $i++) { 
                          $xml = simplexml_load_file($list[$i]);
                          $id = $xml->id;
                          $stringname = $xml->name;
                          $name = str_replace("_"," ",$stringname);
                          $stringemail = $xml->email;
                          $email = str_replace("_"," ",$stringemail);
                            echo '<tr>';

                                echo '<td>' . $xml->id . '</td>';
                                echo '<td>' . $name . '</td>';
                                echo '<td>' . $email . '</td>';
                                echo '<td>' . $xml->password . '</td>';
                                echo '<td>' . $xml->address . '</td>';
                                echo '<td>' . $xml->admin . '</td>';
                                echo '<td>' . 
                                "<a href = 'deleteUser.php?email=$email&id=$id' class='btn custom-button'><i class='fa fa-trash'></i></button>
                                <a href = 'editUser.php?email=$email&id=$id' class = 'btn custom-button'><i class = 'fa fa-edit'</i></button>" 
                                . '</td>';
                            echo '</tr>';
                        }
                    ?>
                </table>

                <br/>
                <p class="subtitle">Backstore Navigation</p>

                <div class="row backstore-navigation">
                  <div class="col-lg-4 col-12">
                    <a href="userlist.php" class="custom-button">User List</a>
                  </div>
                  <div class="col-lg-4 col-12">
                    <a href="orderlist.php" class="custom-button">Order List</a>
                  </div>
                  <div class="col-lg-4 col-12">
                    <a href="listproduce.php" class="custom-button">Product List</a>
                  </div>
                </div>
          
              
              <!--Main content ends here!-->
            </div>

        </div>

        <footer>
          <div class="row page-width">

            <div class="col-lg-3 col-md-12">
              <p class="footer-name"><a href="index.html">TastyGrocery.com</a></p>
            </div>

            <div class="col-lg-6 col-md-12">
              <div class="icon-bar-foot">
                  <a href="https://www.facebook.com" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
                  <a href="https://www.twitter.com" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a>
                  <a href="https://www.pinterest.com" target="_blank" class="pinterest"><i class="fab fa-pinterest"></i></a>
                  <a href="https://www.tumblr.com" target="_blank" class="tumblr"><i class="fab fa-tumblr"></i></a>
                  <a href="mailto:?" class="email"><i class="far fa-envelope"></i></a>
              </div>
            </div>

            <div class="col-lg-3 col-md-12">
              <p class="contact"><a href="mailto:grocery@mailinator.com">Contact us</a></p>
            </div>

          </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>




    
  </body>

</html>