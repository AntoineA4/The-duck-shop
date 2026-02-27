<?php
session_start();
include_once("./model/product.model.php");
$products = getAllProduct();

include("./templates/index.phtml");


