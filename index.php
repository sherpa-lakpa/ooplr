<?php

require_once 'core/init.php';

// $user = DB::getInstance()->get('users', array('username', '=', 'lakpa'));

// $user = DB::getInstance()->insert('users', array(
// 	'username' => 'Dale',
// 	'password' => 'password',
// 	'salt' => 'salt'
// ));

// $user = DB::getInstance()->update('users', 2, array(
// 	'username' => 'New_Name',
// 	'password' => 'newpassword'
// ));

if (Session::exists('home')) {
	echo Session::flash('home');
}

$user = new User;
if($user->isLoggedIn()){
?>
<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo $user->data()->name; ?></a></p>
<ul>
	<li><a href="update.php">Update</a></li>
	<li><a href="changepassword.php">Change Password</a></li>
	<li><a href="logout.php">Logout</a></li>
</ul>
<?php
if($user->hasPermission('admin')){
	echo 'you are administrator';
}
}else{
	echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}
