<div class="container">
<?php 

session_start();
$users = $this->getData('users');

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {	
	define('USERNAME', 'Guest');

} elseif($data[0] === 1){
    
    $email = $_SESSION['user'];
    $key   = array_search($email, array_column($users, 'email'));
    define('USERID', $users[$key]->id);
    define('USERNAME', $users[$key]->firstname);
    define('SURNAME', $users[$key]->surname);
    define('EMAIL', $users[$key]->email);
    define('PHONE', $users[$key]->phone);
    define('LOCATION', $users[$key]->location);
    
} elseif($data[0] === 0) {
    
    $email = $_SESSION['admin'];
    $key   = array_search($email, array_column($users, 'email'));
    define('USERID', $users[$key]->id);
    define('USERNAME', $users[$key]->firstname);
    define('SURNAME', $users[$key]->surname);
    define('EMAIL', $users[$key]->email);
    define('PHONE', $users[$key]->phone);
    define('LOCATION', $users[$key]->location);
}
?>
</div>