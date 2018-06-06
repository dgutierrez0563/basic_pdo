<?php  
	//require_once "data/conexion/conexion.php";

	require_once 'User.php';

	// $user = new User('1','mmora','clave','Admin');
	// $user->save();

	// echo $user->getUserName().' successfully!' .$user->getId();
	$data = User::searchUserName('m'); 



?>
<html>
   <head></head>
   <body>
      <ul>
      <?php foreach($data as $item): ?>
      <li class=""> <?php echo $item['IDEmployer'] . ' ' . $item['UserName'].' '.$item['Role']; ?> </li>
      <?php endforeach; ?>
      </ul>
   </body>
</html>