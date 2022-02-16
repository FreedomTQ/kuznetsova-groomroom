<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Service</title>
</head>
<body>
<header>
  <div class="logo-img">
  <img src="logo/logo.jpg" alt="" class="logo-img"> 
  </div>
   <div class="contain-admin">
      <ul class="main-menu">
        <li><a href="index.php">Главная страница</a></li>
        <li><a href="adding.php">Отправить заявку</a></li>
        <li>Список услуг
          <ul class="sub-menu">
          <li><a href="pokr.php">Покраска</a></li>
          <li><a href="str.php">Стрижка</a></li>
          <li><a href="ukl.php">Укладка</a></li>
          <li><a href="bby.php">Барбершоп</a></li>
          </ul>
      </li>
        <li><a href="masters-2.php">Наши мастера</a></li>
        <li><a href="admin.php">Личный кабинет</a>
          <ul class="sub-menu">
          <li><a href="admin.php">Заявки</a></li>
          <li><a href="masters.php">Мастера</a></li>
          </ul>
        </li>
        <li>Связаться с нами:<br> +7 (836)462-18-29</li>
        </ul>
</div>
    <div class="exit">
    <form method="POST">
      <i class="admin-pidor">Вы вошли как админ</i>
      <input type="submit" name="exit" value="Выйти">  
    </form>
    </div> 
</header>
       <div class="container-4">
          <form method="POST">
          <br>
          <b><p>Введите или выберите название услуги для проверки по БД:</p></b>
          <br>
          <input type="text" placeholder="Название услуги" name="c" >
          <select name="с" size="1">
          <option value="Покраска, тонирование или мелирование волос">Покраска, тонирование или мелирование  волос</option>
          <option value="Модельные, повседневные или на выбор стрижки">Модельные, повседневные или на выбор стрижки</option>
          <option value="Укладка волос">Укладка волос</option>
          <option value="Оформление бороды с усами">Оформление бороды с усами</option>
          </select>
          </br>
          <input type="submit" name="est" value="Проверить записи на услугу">  
          <br><br>
          <input type="submit" name="add" value="Добавить">
          <br><br>
          <input type="submit" name="erp" value="Удалить">
          </form>

           </div> 
   
   <?php 
 require_once 'connect.php';
 $reg=$_POST['c'];
 if (isset($_POST['est'])){

  
  $res= mysqli_query($db, "SELECT * FROM `books` WHERE `name`='$ret' OR  `avtor`='$ret' OR `janr`='$reg'");
    while($row=$res->fetch_assoc()){
       echo "
    <div class='list-in'>
        <div class='img-book'><img class='booki' src='img/1.jpg'{$row['img']}></div> <input type='text' placeholder='На какое изображение изменить' name='image' >
        <div class='name-book'>Название книги:{$row['name']}</div> <input type='text' placeholder='На какое название изменить' name='names' > 
        <div class='avtor-book'>Имя автора: {$row['avtor']}</div> <input type='text' placeholder='На какого автора изменить' name='avtrors' >
        <div class='janr-book'>Жанр:{$row['janr']}</div> <input type='text' placeholder='На какой жанр изменить' name='janrs' >
        <div class='opis-book'>Краткое описание: {$row['kratkoe']}</div> <input type='text' placeholder='На какое описание изменить' name='kratos' >
        <button class='cerwa' name='kurwa'>Изменить</button>
    </div>";
    }
  }
if (isset($_POST['cerwa'])) {

  if($_POST['image'] != "" || $_POST['names'] != "" || $_POST['avtors'] != "" || $_POST['janrs'] != "" || $_POST['kratos'] != "") {
    $new_img=$_POST['image'];
    $new_name=$_POST['names'];
    $new_avtor=$_POST['avtors'];
    $new_janr=$_POST['janrs'];
    $new_kratkoe=$_POST['kratos'];

    $cerwa= mysqli_query($db, "INSERT INTO  `books` (`avtor`, `janr`, `name`, `img`, `kratkoe`) VALUES ('$new_avtor', '$new_janr', '$new_name', '$new_img', '$new_kratkoe')");
}  
}      

  if (isset($_POST['add'])){
    $search = mysqli_query($db, "SELECT * FROM `appliction` AND `priority` WHERE `priority`='$reg'");
    if(mysqli_num_rows($search)<1) {
      $add= mysqli_query($db, "INSERT INTO  `priority` (`priority`) VALUES ('$reg')");
      echo "<div>Услуга была добавлена!</div>";
    }
    else {
      echo "<div> Такая услуга уже есть!</div>"; 
    }
  }

	if (isset($_POST['erp'])){
    $let = mysqli_query($db, "SELECT * FROM `appliction` AND `priority` WHERE `priority`='$reg'");
    if(mysqli_num_rows($search)<1) {
    $del= mysqli_query($db, "DELETE FROM  `priority` WHERE `priority`='$reg'");
    $lets= mysqli_query($db, "SELECT * FROM `priority` WHERE `priority`='$reg'"); 
    if(mysqli_num_rows($lets)<1) {
      echo "<div> Такой услуги теперь нет</div>";
    }
  }
}
    if (isset($_POST['exit'])){
      setcookie('login',  '$value', time()-86400);
      
      setcookie('psw',  '$value', time()-86400 );	
      header("Location:index.php");
  }
    
   

//  session_start();
//  echo $_COOKIE["id"];
//  $kyky=$_SESSION["id_user"];
// echo $kyky;

// echo $_COOKIE["log"];



?>
   <footer>
   <p class=""></p>
   </footer>

</body>
</html>