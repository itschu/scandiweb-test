<?php

    if(isset($_POST['delete'])){

        require_once("class-autoload.inc.php");

        $product = new ProductsContrl("", "", "", "", "");

        $product->deleteProduct($_POST);

        header("location: ../");

    }else{
        header("location: ../");
    }
