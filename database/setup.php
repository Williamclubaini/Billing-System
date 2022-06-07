<link rel="stylesheet" href="../assets/bootstrap/dist/css/bootstrap.min.css">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['action'])){
  if($_GET["action"] == "setup"){

  //Create database
  $sql = "CREATE DATABASE `billing_system`";
  $conn->query($sql);
  $conn = mysqli_connect("localhost","root","","billing_system");

  $sql= " CREATE TABLE `invoices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` double(10, 2) NOT NULL,
  `total_cost` double(10, 2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `paid_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4";
  $conn->query($sql);


  $sql= " CREATE TABLE `invoice_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
  $conn->query($sql);

  $sql= " CREATE TABLE `payments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `invoice_id` int(50) NOT NULL,
  `account` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4";
  $conn->query($sql);


  $sql= "CREATE TABLE `orders` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `customer_id` int(50) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` double(10, 2) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_cost` double(10, 2) NOT NULL,
  `status` varchar(50) NOT NULL COMMENT 'delivered;shipped;cancelled;pending;',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ac_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4";
  $conn->query($sql);

  $sql= "CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10, 2) NOT NULL,
  `quantity` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4";
  $conn->query($sql);


  $sql= "INSERT INTO `products` (
    `id`,
    `image`,
    `name`,
    `price`,
    `quantity`,
    `status`
  )
VALUES (
    1,
    'Antibiotics_Chickens_1500x900.jpg',
    'Antibiotics Chickens',
    15000.00,
    0,
    'Latest'
  ),
  (
    2,
    '81625405-hintergrund-von-getrockneten-maissamen-landwirtschaftliches-produkt.jpg',
    'Hintergrund Maissamen',
    10000.00,
    NULL,
    NULL
  ),
  (
    3,
    'BabyCarobTrees.jpg',
    'Carob Trees',
    7000.00,
    NULL,
    'Latest'
  ),
  (
    4,
    'cassava_stakes.jpg',
    'Cassava Stakes',
    6000.00,
    NULL,
    NULL
  ),
  (
    5,
    'sweet-potato-marguerite-500.jpg',
    'Sweet Potato Marguerite',
    4000.00,
    NULL,
    'Latest'
  ),
  (6, 'images.jpg', 'Cow', 75000.00, NULL, NULL)";
  $conn->query($sql);


  $sql= "CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `location` varchar(50) NOT NULL,
  `userType` int(5) NOT NULL COMMENT '0 = administrator; 1 = customer;',
  `password` varchar(255) NOT NULL,
  `signindate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4";
  $conn->query($sql);


$sql= "INSERT INTO `users` (
    `id`,
    `firstname`,
    `surname`,
    `email`,
    `phone`,
    `location`,
    `userType`,
    `password`,
    `signindate`
  )
VALUES (
    1,
    'Wongani Harry',
    'Mkandawire',
    'wonganiharry@gmail.com',
    '0992166825',
    'Area 25',
    0,
    '8fb94b2d0886944db4e446bd535cf767',
    '2022-04-25 00:52:02'
  )";

if ($conn->query($sql)) {
    header("location:../index.php");
} else {
    echo "Something's Wrong";
}
}
}

?>
<div class="px-4 py-5 my-5 text-center">
    <div class="col-lg-6 mx-auto">
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a type="button" href="setup.php?action=setup" class="btn btn-primary btn-lg px-4 me-sm-3">CREATE
                DATABASE</a>
        </div>
    </div>
</div>