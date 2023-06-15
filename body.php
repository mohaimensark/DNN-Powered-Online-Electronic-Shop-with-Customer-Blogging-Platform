<?php
session_start();
require_once './dbconn.php';
$user_id = 0;
if (isset($_SESSION['user_login'])) {
  $user_id = $_SESSION['user_login'];
  $take = mysqli_query($link, "SELECT * FROM `user` WHERE user_id='$user_id';");
  $taker = mysqli_fetch_assoc($take);
  $name = $taker['name'];
  $splitter = " ";
  $pieces = explode($splitter, $name);
  //SELECT * FROM `user_info` WHERE user_id='1';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-SHOP</title>
  <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0/css/bootstrap.min.css"> -->

  
  <!-- jQuery -->
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>



  <link rel="stylesheet" href="styles/indexSt.css">
  <link rel="stylesheet" href="styles/myCartSt.css">
  <style>
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
  </style>
</head>

<body>

  <!--Navbar START -->
  <div class="header-sec">
    <div class="row">
      <div class="col-md-9 col-sm-9 brand-logo">
        <p><span class="no-same no-shop">E-</span><span class="no-same logo-shop">SHOP</span></p>
      </div>

      <div class="col-md-2 col-sm-2" style="text-align: center;margin-top: 10px;margin-bottom: 10px;">
        <?php
        if ($user_id) {
          echo "Welcome ";
          echo $name;
        }
        ?>
      </div>
      <div class="col-md-1 col-sm-1">
        <div class="dropdown">

          <a class="dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if ($user_id) {
              echo '<img src="images/user_on.png" alt="">';
            } else {
              echo '<img src="images/user_off.png" alt="">';
            }
            ?>
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php
            if ($user_id > 0) { ?>
              <li><a class="dropdown-item" href="regiForm.php">Sign Up</a></li>
              <li><a class="dropdown-item" href="profile.php">Profile</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              <?php
            } else { ?>
              <li><a class="dropdown-item" href="login.php">Log in</a></li>
              <li><a class="dropdown-item" href="regiForm.php">Sign Up</a></li>

              <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-bg">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <div class="d-flex myCartMenu me-2">
              <a class="" href="index.php">Home</a>
            </div>
          </li>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Explore </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#newest">Newest Arrival</a>
                </li>

                <li><a class="dropdown-item" href="#"> Category &raquo; </a>

                  <ul class="submenu dropdown-menu">


                    <?php
                    $tb_pinfo = mysqli_query($link, "SELECT * FROM `categories`");
                    while ($row3 = mysqli_fetch_assoc($tb_pinfo)) { ?>
                      <li><a class="dropdown-item" href="#<?php echo ucwords($row3['cat_title']); ?>"><?php echo ucwords($row3['cat_title']); ?></a></li>
                      <?php
                    }
                    ?>
                  </ul>
                </li>
                <li>
                  <a class="dropdown-item" href="gsapAnimation.php">Gsap Animation</a>
                </li>
                <li>
                  <a class="dropdown-item" href="detect.php">Classification</a>
                </li>
              </ul>
            </li>

          </ul>

          <li class="nav-item">
            <a class="nav-link" href="gsapAnimation.php">Gsap Animation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="detect.php">Classification</a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="#about-us">About us</a>
          </li>

          <?php
          if ($user_id > 0) { ?>
            <li class="nav-item">
              <a class="nav-link" href="rating.php">Rate us</a>
            </li>
            <?php
          } else { ?>

            <?php
          }
          ?>
          <?php
          if ($user_id > 0) { ?>
            <li class="nav-item">
              <a class="nav-link" href="discussion.php">Discussion</a>
            </li>
            <?php
          } else { ?>

            <?php
          }
          ?>

        </ul>
        <?php
        if ($user_id > 0) { ?>
          <div id="myCartBtn" class="myCartMenu">
            <a href="mycart.php">
              <i class="fas fa-shopping-cart"></i>
              <span id="cart-item" class="badge badge-success"></span>
            </a>
          </div>
          <?php
        } else { ?>
          <div id="myCartBtn" class="myCartMenu">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-item" class="badge badge-success"></span>
          </div>
          <?php
        }
        ?>

      </div>

    </div>
  </nav>
  <!--Navbar END -->


  <!-- slider Start Here -->
  <div class="slider container">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/laptop_Banner.jpg" class="d-block w-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/mobile_Banner.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="images/game_Kit1.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- slider end here -->
  <br><br>



>

  <!-- Newest items with pagination start here -->
  <section class="container product-card" id="newest">
    <div id="message"></div>
    <div class="cat1Heading d-flex justify-content-between">
      <h3>Newest Arrival</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4" id="replace_page">
      <?php
      $new = mysqli_query($link, "SELECT * FROM `products` ORDER BY `product_id` DESC LIMIT 3;");
      $hw = mysqli_fetch_assoc($new);
      while ($hw) { ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="product-bg">
            <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
              <img src="admin/images/<?php echo $hw['product_image'] ?>" class="card-img-top img-fluid" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $hw['product_title']; ?>
                </h5>
                <p class="card-text">
                  <?php echo $row['description'] ?>
                </p>
              </div>
              <div class="d-flex justify-content-between pCardPrice">
                <h4>Price:</h4>
                <h4>
                  <?php echo $hw['product_price']; ?>
                </h4>

              </div>

              <div class="card-footer p-1">
                <form action="" class="form-submit">
                  <input type="hidden" class="pqty" value="1">
                  <input type="hidden" class="pid" value="<?= $hw['product_id'] ?>">
                  <input type="hidden" class="pname" value="<?= $hw['product_title'] ?>">
                  <input type="hidden" class="pprice" value="<?= $hw['product_price'] ?>">
                  <input type="hidden" class="pimage" value="<?= $hw['product_image'] ?>">
                  <?php
                  if ($user_id > 0) { ?>
                    <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                      cart</button>
                    <?php
                  } else { ?>
                    <button class="btn btn-info btn-block addItemBtn disabled"><i
                        class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                      cart</button>
                    <?php
                  }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php
        $hw = mysqli_fetch_assoc($new);
      }
      ?>


    </div>

    <div>

      <?php include('dbconn.php');

      $limit = 3;
      $sql = "SELECT COUNT(`product_id`) FROM `products`";
      $rs_result = mysqli_query($link, $sql);
      $row = mysqli_fetch_row($rs_result);
      $total_records = $row[0];
      $total_pages = ceil($total_records / $limit);

      ?>

      <div align="center">
        <ul class="pagination" id="pagination">
          <?php if (!empty($total_pages)):
            for ($i = 1; $i <= $total_pages; $i++):
              if ($i == 1):
                ?>
                <li class="page-item active" id="<?php echo $i; ?>">
                  <button class="page-link " style="margin-left: 10px" ><?php echo $i; ?></button>
                </li>
                <?php
              else:
                ?>
                <li  class="page-item " style="margin-left: 10px" id="<?php echo $i; ?>"><button class="page-link"><?php echo $i; ?></button>
                </li>
                <?php
              endif;
              ?>
              <?php
            endfor;
          endif;
          ?>
        </ul>
      </div>
    </div>


  </section>


  <?php
  $info = mysqli_query($link, "SELECT * FROM `categories`;");
  $total_categories = mysqli_num_rows($info);
  $row1 = mysqli_fetch_assoc($info);
  $category_name = $row1['cat_title'];
  while ($row1) { ?>

    <!-- Laptop START Here-->
    <section class="container product-card" id="<?php echo ucwords($row1['cat_title']); ?>">
      <div class="cat1Heading d-flex justify-content-between">
        <h3>
          <?php echo ucwords($row1['cat_title']); ?>
        </h3>

      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $category_id = $row1['cat_id'];

        $tb_pinfo = mysqli_query($link, "SELECT * FROM `products` where `cat_id`='$category_id'");
        $total_products = mysqli_num_rows($tb_pinfo);
        $i = 1;

        $row = mysqli_fetch_assoc($tb_pinfo);
        $cat_id = $row['cat_id'];
        while ($row and $i < 4) { ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="product-bg">
              <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
                <img src="admin/images/<?php echo $row['product_image'] ?>" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $row['product_title']; ?>
                  </h5>
                  <p class="card-text">
                    <?php echo $row['description'] ?>
                  </p>
                </div>
                <div class="d-flex justify-content-between pCardPrice">
                  <h4>Price:</h4>
                  <h4>
                    <?php echo $row['product_price']; ?>
                  </h4>

                </div>


                <div class="card-footer p-1">
                  <form action="" class="form-submit">
                    <input type="hidden" class="pqty" value="1">
                    <input type="hidden" class="pid" value="<?= $row['product_id'] ?>">
                    <input type="hidden" class="pname" value="<?= $row['product_title'] ?>">
                    <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                    <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                    <?php
                    if ($user_id > 0) { ?>
                      <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                        cart</button>
                      <?php
                    } else { ?>
                      <button class="btn btn-info btn-block addItemBtn disabled"><i
                          class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                        cart</button>
                      <?php
                    }
                    ?>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php
          $row = mysqli_fetch_assoc($tb_pinfo);
          $i++;
        }
        ?>


      </div>
      <?php
      if ($total_products > 3) { ?>
        <div>
          <a href="categories.php?id=<?php echo base64_encode($category_id); ?>"
            class="cat1Heading d-flex justify-content-between"><i class=""></i>see more</a>
        </div>
        <?php
      } else if ($user_id > 0 && $total_products == 0) { ?>
          <div class="cat1Heading d-flex justify-content-between"><i class=""></i>No more products available</a>
          </div>
      <?php }
      ?>
    </section>

    <?php
    $row1 = mysqli_fetch_assoc($info);
  }
  ?>




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <!-- // Multiple dropdown javascript -->
  <script type="text/javascript">
    //	window.addEventListener("resize", function() {
    //		"use strict"; window.location.reload(); 
    //	});


    document.addEventListener("DOMContentLoaded", function () {


      /////// Prevent closing from click inside dropdown
      document.querySelectorAll('.dropdown-menu').forEach(function (element) {
        element.addEventListener('click', function (e) {
          e.stopPropagation();
        });
      })



      // make it as accordion for smaller screens
      if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
          everydropdown.addEventListener('hidden.bs.dropdown', function () {
            // after dropdown is hidden, then find all submenus
            this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
              // hide every submenu as well
              everysubmenu.style.display = 'none';
            });
          })
        });

        document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
          element.addEventListener('click', function (e) {

            let nextEl = this.nextElementSibling;
            if (nextEl && nextEl.classList.contains('submenu')) {
              // prevent opening link if link needs to open dropdown
              e.preventDefault();
              console.log(nextEl);
              if (nextEl.style.display == 'block') {
                nextEl.style.display = 'none';
              } else {
                nextEl.style.display = 'block';
              }

            }
          });
        })
      }
      // end if innerWidth

    });
  // DOMContentLoaded  end
  </script>
  <script type="text/javascript">
    
    //pagination jquery
   


    $(document).ready(function () {
     
       $.ajaxSetup({
    timeout:10000,
    beforeSend: function(xhr) {
      //
    },
    complete:function(xhr,status) {
      //
    },      
    error: function(xhr, status, err) {
      switch (status){
      case 'timeout': {}
      case 'parseerror': {}
      case 'abort': {}
      case 'error': {}
      default: {}
      }
    }
  });

  $("#pagination li").click(function (e) {
  e.preventDefault();

  $("#pagination li").removeClass('active');
  $(this).addClass('active');
  var pageNum = this.id;
  var page = parseInt(pageNum);

 // alert(pageNum);

  $.ajax({
    url: 'paginations.php',
    method: 'get',
    data: {
      pageno: pageNum,
    },
    success: function (response) {
      // alert(data);
      $("#replace_page").html(response);
      //alert(response);
    }
  });
});

      // Send product details in the server
      $(".addItemBtn").click(function (e) {

        e.preventDefault();
        var $form = $(this).closest(".form-submit");
        var pid = $form.find(".pid").val();
        var pname = $form.find(".pname").val();
        var pprice = $form.find(".pprice").val();
        var pimage = $form.find(".pimage").val();
        //var pcode = $form.find(".pcode").val();

        var pqty = $form.find(".pqty").val();

        $.ajax({
          url: 'action.php',
          method: 'post',
          data: {
            pid: pid,
            pname: pname,
            pprice: pprice,
            pqty: pqty,
            pimage: pimage,
            //pcode: pcode
          },
          success: function (response) {
            $("#message").html(response);
            //window.scrollTo(0, 0);
            load_cart_item_number();
          }
        });
      });

      // Load total no.of items added in the cart and display in the navbar
      load_cart_item_number();

      function load_cart_item_number() {
        $.ajax({
          url: 'action.php',
          method: 'get',
          data: {
            cartItem: "cart_item"
          },
          success: function (response) {
            $("#cart-item").html(response);
          }
        });
      }
    });
  </script>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>