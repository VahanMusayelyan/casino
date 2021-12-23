<?php

require('server.php');

if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $psw = $_POST['password'];
  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    if ($name == $row['name']) {
      if (password_verify($psw, $row['password'])) {
        if ($ip == $row['IP']) {
          setcookie('user', $name, 2147483647);
          header("location: index.php");
        }
      }
    }
  }
}
if (isset($_GET['removeid'])) {
  $id = $_GET['removeid'];
  $sql = "SELECT * FROM profiles WHERE ID=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $profile_id = $row["profile_id"];
  $name = $row["name"];
  $price = $row["price"];
  $items = $row["items"];
  $link = $row["steam_link"];
  $images = $row["images"];
  $lvl = $row["lvl"];
  $status = $_GET['status'];
  $sql = "INSERT INTO verified_profiles(profile_id,name,price,items,steam_link,images,lvl,status) VALUES('$profile_id','$name','$price','$items','$link','$images','$lvl','$status')";
  mysqli_query($conn, $sql);
  $sql = "DELETE FROM profiles WHERE ID=$id";
  mysqli_query($conn, $sql);
  header("location: profile.php?id=".$id+=1);
}