<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Регистрация</title>
</head>
<body>
<header>
  <div class="logo-img">
 <!-- <img src="logo/logo.svg" alt="" class="logo-img">--> 
  <img src="logo/logo-groom.svg" alt="" class="logo-img">
 
  </div>
   <div class="contain">
      <ul class="main-menu">
      <li><a href="index.php">Главная</a></li>  
      <li><a href="index.php">Личный кабинет</a></li>
      <li><a href="adding.php">Отправить заявку</a></li>
        <li><a href="index.php">Список услуг</a>
          <ul class="sub-menu">
          <li><a href="index.php">Груминг</a></li>
          <li><a href="index.php">КУГ</a></li>
          <li><a href="index.php">Комплекс-уход</a></li>
          </ul>
      </li>
      <li><a href="index.php">Наши мастера</a>
          <ul class="sub-menu">
          <li><a href="index.php">Кусатик</a></li>
          <li><a href="index.php">Полосатик</a></li>
          <li><a href="index.php">Ты = пидор</a></li>
          </ul>
      </li>
          <li>Связаться с нами:<br><a href="tel:+7 (836)462-18-29"> +7 (836)462-18-29</a></li>
        </ul>
</div>
<div class="mobile">
        <label for="menu" onclick>≡</label>
        <div class="contain-2">
        <ul class="main-menu-2">
      <li><a href="index.php">Главная</a></li>  
      <li><a href="index.php">Личный кабинет</a></li>
      <li><a href="adding.php">Отправить заявку</a></li>
      <li><a href="index.php">Список услуг</a></li>
      <li><a href="index.php">Наши мастера</a></li>
      <li>Связаться с нами:<br><a href="tel:+7 (836)462-18-29"> +7 (836)462-18-29</a></li>
        </ul>
        </div>
        </div>
</header>

<form method="POST">
    <div class="container">
      <h1>Регистрация</h1>

      <label for="name"><b>ФИО:</b></label>
      <input type="text" placeholder="Введите ФИО, только кириллица" name="name" pattern="^[А-Яа-яЁё\s]+$" required>
    </br>
      <label for="login"><b>Логин:</b></label>
      <input type="text" placeholder="Введите логин, только латиница" name="login" pattern="^[a-zA-Z\s]+$" required>
    </br>
    <label for="email"><b>Email:</b></label>
      <input type="email" placeholder="Введите электронную почту" name="email" required>
    </br> 
      <label for="psw"><b>Пароль:</b></label>
      <input type="password" placeholder="Введите пароль" name="psw" required>
    </br>
      <label for="psw_repeat"><b>Повторите пароль:</b></label>
      <input type="password" placeholder="Повторите пароль" name="psw_repeat" required>
    </br>
    <input type="checkbox" required/> <b class="">Согласие на обработку персональных данных</b>
    </br>
    <br>
    <input type="submit" name="registerbtn" value="Регистрация" >  
    <p>Уже есть аккаунт? <a href="index.php" class="attention">Войдите</a></p>
    <br>
    <br>
    </div>
  </form>
  <footer class="reg-foot">
  <p class=""></p>
</footer>

<?php
if (isset($_POST['registerbtn'])){
require_once 'connect.php';

    $name = $_POST['name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
    $psw_repeat = $_POST['psw_repeat'];

    if ($psw === $psw_repeat) {
        $sql="SELECT * FROM `users` WHERE `login`='$login'";
        $res= mysqli_query ($db, $sql);
        $num= mysqli_num_rows($res);
        
        if ($num==0) {
        mysqli_query($db, "INSERT INTO `users` (`name`, `login`, `email`, `password`) VALUES ('$name', '$login', '$email', '$psw')");
        header('Location:index.php');
        echo "<div>Вы были зарегестрированы!</div>";
        }
        } else {
        die('Пароли не совпадают');
    }
  }
?>





</body>