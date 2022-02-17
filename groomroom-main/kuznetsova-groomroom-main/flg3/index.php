


<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Главная страница</title>
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
<form method="POST">
  <div class="container-2">
    <label for="login" name="a"><b>Логин</b></label>
    <input type="text" placeholder="Введите логин, только латиница" name="login" pattern="^[a-zA-Z\s]+$" required>
    <br>
    <label for="psw" name="psw"><b>Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="psw" required>
    </br>
    <input type="submit" name="vhod" value="Вход"> 
    <br>
    Еще нет аккаунта? <a href="reg-form.php" class="attention">Зарегистрируйтесь</a>  
  </div>    
</form>
</header>

<div class="main-info">

<div class="block-1">
<br>
<a href="#">Приучение щенка к грумингу</a>
<!--<img src="img/block-1-1.jpg" alt="" >-->
<p class="bottom-block-1">от 1200 ₽</p>
</div>

<div class="block-2">
<br>
<a href="#">Мытье + КУГ</a>
<!--<img src="img/block-1-1.jpg" alt="" >-->
<p class="bottom-block-2">от 1250 ₽</p>
</div>

<div class="block-3">
<br>
<a href="#">Комплексный уход</a>
<!--<img src="img/block-1-1.jpg" alt="" >-->
<p class="bottom-block-3">от 2450 ₽</p>
</div>





</div>






<!--
<div class="comments">
<form method="POST">
  <p>
    <label>Имя:</label>
    <input type="text" name="name" class="comment-name"/>
    <label>Комментарий:</label>
    <br />
    <textarea name="text_comment" cols="20" rows="5"></textarea>
  </p>
  <p>
    <input type="hidden" name="page_id" value="150" />
    <input type="submit" value="Отправить" name="kek"/>
  </p>
</form>
</div>
-->



<footer class="reg-foot">
  <p class=""></p>
</footer>

<?php
if(isset($_POST['vhod'])){

require_once 'connect.php';

if ($_POST['login'] != "" && $_POST['psw'] != "") //если поля заполнены    

{    

    $login = $_POST['login'];  
    $psw =$_POST['psw'];  
   
	
    $result = mysqli_query($db, "SELECT * FROM `users` WHERE `login`='$login' AND `password` ='$psw'");
		if ($result)
	{
		
	$sum_row_users = mysqli_num_rows($result);
	if ($sum_row_users==1)
	{
	$aaa = mysqli_fetch_assoc($result);
	
	if($aaa['id_rol']==1)
	{
   	session_start();
	$_SESSION["id_user"]=$aaa['id_user'];
	echo $_SESSION["id_user"];
	header("Location:zayav.php");
	
	}
	if($aaa['id_rol']==2)
	{
    session_start();
	$_SESSION["id_user"]=$aaa['id_user'];
	echo $_SESSION["id_user"];
	header("Location:admin.php");
	}
	
        }
    }else
    die('Неверный логин или пароль');
    
}
    
}

?>

</body>
</html>