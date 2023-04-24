<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- styles -->
        <link rel="stylesheet" href="<?=base_url('/assets/css/bootstrap.min.css');?>"/>
        <link rel="stylesheet" href="<?=base_url('/assets/css/font-awesome.min.css');?>"/>
        <link rel="stylesheet" href="<?=base_url('/assets/css/homestyle.css');?>" />
        <!-- styles -->
        <title>Home | Online Shop</title>
    </head>
    <body>
        <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10">
                    <?php
                    if (isset($_COOKIE['cart'])) {
                        $cartArray = explode(',', $_COOKIE['cart']);
                    }
                    foreach($products as $product){ ?>
                        <div class="row p-2 bg-white border rounded mt-2">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="<?=base_url('/assets/images/'.$product->image);?>"></div>
                            <div class="col-md-6 mt-1">
                                <h5><?=$product->product_name?></h5>
                                <p class="text-justify text-truncate para mb-0"><?=$product->product_description?><br><br></p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1"><?=$product->price?> Rs.</h4>
                                </div>
                                <div class="d-flex flex-column mt-4">
                                    <button data-productid="<?=$product->product_id?>" class="btn btn-outline-primary btn-sm mt-2" type="button">
                                    <?php 
                                        if(isset($cartArray)){
                                            if(in_array($product->product_id, $cartArray)){
                                                echo "Remove from cart";
                                            }
                                            else{ 
                                                echo "Add to cart";
                                            }
                                        }
                                        else{
                                            echo "Add to cart";
                                        }
                                    ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <div class="row p-2 bg-white border rounded mt-2">
                            <div class="align-items-center align-content-center col-md-3">
                                <div class="d-flex flex-column">
                                    <a href="<?php echo base_url('/checkout');?>" class="btn btn-outline-primary btn-sm" type="button">Check out</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <script src="<?=base_url('/assets/js/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/js/bootstrap.bundle.min.js');?>" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
        <script src="<?=base_url('/assets/js/script.js');?>" type="text/javascript"></script>
        <script src="<?=base_url('/assets/js/checkout.js');?>" type="text/javascript"></script>
    </body>    
</html>