<?php
include 'dbconn.php';
session_start();

$page_str = $_GET["pageno"];
$page = (int) $page_str;
$user_id = $_SESSION['user_login'];

$limit = 3;
$start_from = ($page - 1) * $limit;
//$sql = "SELECT * FROM `products` ORDER BY `product_id` DESC LIMIT '$start_from', '$limit'";
$sql = "SELECT * FROM `products` ORDER BY `product_id` DESC LIMIT $start_from, $limit";
$rs_result = mysqli_query($link, $sql);

$output = '';
$cart_btn = '';
if ($user_id > 0) { 
  $cart_btn.='<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
    cart</button>';
  
} else { 
  $cart_btn.='<button class="btn btn-info btn-block addItemBtn disabled"><i
      class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
    cart</button>';
 
}

  



if ($rs_result) {
    while ($row = mysqli_fetch_assoc($rs_result)) {
    $output .= '<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="product-bg">
      <div class="card h-100 shadow p-3 mb-5 bg-body rounded">
        <img src="admin/images/' . $row['product_image'] . '" class="card-img-top img-fluid" alt="...">
        <div class="card-body">
          <h5 class="card-title">
          ' . $row['product_title'] . '
          </h5>
          <p class="card-text">
          ' . $row['description'] . '
          </p>
        </div>
        <div class="d-flex justify-content-between pCardPrice">
          <h4>Price:</h4>
          <h4>
          ' . $row['product_price'] . '
          </h4>
  
        </div>
  
        <div class="card-footer p-1">
          <form action="" class="form-submit">
            <input type="hidden" class="pqty" value="1">
            <input type="hidden" class="pid" value="' . $row['product_id'] . '">
            <input type="hidden" class="pname" value=" ' . $row['product_title'] . '">
            <input type="hidden" class="pprice" value="  ' . $row['product_title'] . '">
            <input type="hidden" class="pimage" value="' . $row['product_image'] . '">
            '.$cart_btn.'
           
          </form>
        </div>
      </div>
    </div>
  </div>';
  }

  echo $output;

} else {
  echo "error occured";
}

?>