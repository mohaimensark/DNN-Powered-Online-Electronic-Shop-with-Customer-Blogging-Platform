<?php
session_start();
require_once './dbconn.php';

if (!isset($_SESSION['aduser_login'])) {
    header('location:adminlogin.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>E-SHOP</title>
    <style>
        body {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .bodyclass {
            display: flex;
            flex-direction: column;
            justify-content: center;

        }

        .content {
            min-height: 410px;

        }

        .lol {
            color: white;
        }

        .footer-area {
            padding: 25px;
            background: #3CA9E8;
            text-align: center;
            color: #fff;
            margin-top: 10px;
        }
    </style>
    <!-- Bootstrap -->
    <script src="https://kit.fontawesome.com/cc0fc94170.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/indexSt.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="styles/style1.css" rel="stylesheet">

    <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
    <script type="text/javascript" src="adminShowImage.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/show_images.css" />

</head>

<body>

    <div class="bodyclass">

        <h1 class="text-primary"><i class="far fa-plus-square"></i> Add Product <small class="lol"> with classification</small></h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
           
        </ol>
        <?php


        if (isset($_POST['add-productc'])) {
            $cat_name = $_POST['choose_cat22'];
            $brand_id = $_POST['choose_brand'];
            $product_title = $_POST['product_title'];
            $product_price = $_POST['product_price'];
            
            $query_cat = "SELECT * from `categories` where `cat_title`='$cat_name'";
            $res=mysqli_query($link,$query_cat);
            $cat_id = 0;

            while($row = mysqli_fetch_assoc($res)){
               $cat_id = $row['cat_id'];
               break;
            }

            $photo = $_FILES['photo']['name'];
            $photo = explode('.', $photo);
            $photo_extension = end($photo);
            $photo_name = $product_title . '.' . $photo_extension;
            $dc = $_POST['dc'];

         
           // echo $cat_name;
           // echo $photo_name;
           

            $query = "INSERT INTO `products`(`cat_id`, `brand_id`, `product_title`, `product_price`, `product_image`,`description`) VALUES ('$cat_id','$brand_id','$product_title','$product_price','$photo_name','$dc')";
            $result = mysqli_query($link, $query);
            if ($result) {
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . $photo_name);
                $success = "Data inserted successfully";
                header("location: index.php");
            } else {
                $error = "Wrong";
            }
        }

        ?>
        <div class="row">
            <?php if (isset($success)) {
                echo '<p class="alert alert-success">' . $success . '</p>';
            } ?>
            <?php if (isset($error)) {
                echo '<p class="alert alert-danger">' . $error . '</p>';
            } ?>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <!-- <div id="pred-result" class="pred_result hidden"></div> -->
                <form action="" method="POST" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="product_title" class="lol">Category</label>
                        <input type="text" name="choose_cat22" placeholder="category" id="choose_cat22"
                            class="form-control" required />
                    </div>


                    <div class="form-group">
                        <label for="Choose_brand" class="lol">Chose Brand</label>
                        <select class="form-control" id="Choose_brand" name="choose_brand">
                            <option value="">Choose product Brand</option>

                            <?php
                            $brand_info = mysqli_query($link, "SELECT * FROM `brands`");

                            while ($row1 = mysqli_fetch_assoc($brand_info)) { ?>

                                <option value="<?php echo $row1['brand_id']; ?>"> <?php echo $row1['brand_title']; ?>
                                </option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="product_title" class="lol">Product Title</label>
                        <input type="text" name="product_title" placeholder="Product Name" id="product_title"
                            class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label for="product_price" class="lol">Product Price</label>
                        <input type="number" name="product_price" placeholder="Product Price" id="product_price"
                            class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label for="dc" class="lol">Description</label>
                        <input type="text" name="dc" placeholder="Product Description" id="dc" class="form-control"
                            required />
                    </div>
                    <!-- <div class="form-group">
                        <label for="photo" class="lol">Photo</label>
                        <input type="file" id="photo" name="photo" class="lol">
                    </div> -->
                    <div class="panel">
                        <label for="photo" class="lol">Photo</label>
                        <input type="file" id="file-upload" class="hidden" name = "photo" accept="image/jpg,image/png,image/gif,image/jpeg"
                            class="lol" />
                        <label for="file-upload" id="file-drag" class="upload-box">
                            <div id="upload-caption">Click to upload image</div>
                            <img id="image-preview" class="hidden" />
                        </label>
                    </div>
                    <div class="button_group">
                        <input type="button" value="Clear" class="button" onclick="clearImage();" />
                        <input type="button" value="Predict" class="button" onclick="predict();" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add-productc" value="Add Product"
                            class="btn btn-primary pull-center" style="margin-left: 160px"/>
                    </div>


                </form>
                <br><br>
            </div>
        </div>

    </div>
    <footer>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs/dist/tf.min.js"> </script>
        <!-- <script src="tf.min.js"> </script> -->
        <script type="text/javascript" src="adminShowImage.js"></script>
    </footer>
</body>

</html>