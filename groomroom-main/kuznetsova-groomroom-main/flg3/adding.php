


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Application</title>
    <link rel="stylesheet" type="text/css" href="tcal.css" />
	  <script type="text/javascript" src="tcal.js"></script> 
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
<body>
<form method="POST">
    <div class="container-3">
      <h1>Оставить заявку:</h1>
      <!--<p class="attention">Запись возможна лишь на текущий месяц</p>-->
      <label for="name"><b>Кличка питомца:</b></label>
      <br></br>
      <input type="text" placeholder="Введите кличку вашего питомца" name="name" required/>
      <label for="description"><b>Краткое описание запрашиваемых работ:</b></label>
      <br></br>
      <textarea cols="21" name="description" rows="5" class="text-area" > 
      </textarea>
      </br></br>
      <label for="priority"><b>На какую услугу:</b></label>
      <br></br>
      <select name="priority" size="1">
      <option value="Приучение щенят к грумингу">Приучение щенят к грумингу</option>
      <option value="Мытье + КУГ">Мытье + КУГ</option>
      <option value="Комплексный уход">Комплексный уход</option>
      </select>
      </br>
      <label for="img"><b>Изображение помещения:</b></label>
      <br></br>
      <input class="file" type = "file" name ="img" id="file" />
      <br></br>
      <label for="kratkoe"><b>На какую дату:</b></label>
      </br></br>
      <input type="text" name="date" class="tcal" value="" id="date"/>
      <input type="submit" name="registerbtn" value="Отправить"/>  
     </div>


 </form> 


 <footer>
  <p class=""></p>
</footer>

<?php
if  (isset($_POST['registerbtn'])){
require_once 'connect.php';  

$name = $_POST['name'];
$description = $_POST['description'];
$img = $_POST['img'];
$priority = $_POST['priority'];
$date = $_POST['date'];


$srl= mysqli_query($db, "SELECT * FROM `applications` WHERE `name`='$name' AND `description`='$description' AND `img`='$img' AND `priority`='$priority' AND `date`='$date'");
if(mysqli_num_rows($srl) > 0) {
echo "<div class='error'>Такая запись уже существует, позвоните оператору чтобы уточнить или перезаписаться</div>";
}
else { 
$send= mysqli_query($db, "INSERT INTO `applications` (`name`, `description`, `img`, `priority`, `date`) VALUES ('$name', '$description', '$img', '$priority', '$date')");
if($send) {
        echo "<div class='thx'>Запись прошла успешно!</div>";
    }
    else {
        echo "<div class='error'>Что то пошло не так</div>";
    }

}
}
 

?>

</body>
</html>