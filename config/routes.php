<?php

	if($_GET['module'] == 'home'){
		include "module/home.php";
	}
	elseif($_GET['module'] == 'login'){
		include "module/home.php";
	}
	elseif ($_GET['module'] == 'user'){
		include "module/user/view.php";
	}
	elseif ($_GET['module'] == 'add'){
		include "module/user/form.php";
	}
	elseif($_GET['module'] == 'employer') {
		include "module/employer/view.php";
	}
	else{
		include "module/error/error404.php";
	}
?>