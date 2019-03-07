<?php
/*
coded by m.slamat
*/
/// change password ...
/// crypting the new password
$password = cryptpwd($password,$glob->grab('users','salt','email',$email));
/// affecting the new password to db 
$glob->password = $password;
$glob->email=$email;
if($glob->updatepwd()){
echo(json_encode(array('reponse' =>"1")));
}else{
echo(json_encode(array('reponse' =>"4")));
}

?>