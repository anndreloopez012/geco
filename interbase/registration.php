
<?php
	require_once 'tmfAdm.php';
   
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); 
		$username = pg_escape_string($rmfAdm,$username); 
		$password = stripslashes($_REQUEST['password']);
        $password = pg_escape_string($rmfAdm,$password);
        $id = stripslashes($_REQUEST['adm_usr_ci']);
        $id = pg_escape_string($rmfAdm,$password);
        

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into adm_usuarios (username, adm_usr_password, adm_usr_ci) 
                        VALUES ('$username', '".md5($password)."','$id')";
        $result = pg_query($rmfAdm,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
        }
    }else{
?>
<style type="text/css">
         .col-centrada{ float: none; margin: 0 auto;}
</style>

<div class="form col-md-4 col-centrada">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="id" placeholder="id" class="form-control" required /><br/>
<input type="text" name="username" placeholder="Username" class="form-control" required /><br/>
<input type="password" name="password" placeholder="Password" class="form-control" required />
<input type="submit" name="submit" value="Register" class="btn btn-sm btn-success" />
</form>

<?php 
}
?>

