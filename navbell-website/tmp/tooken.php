<?php
   function tooken(){
       $key = "team7";
       $time = (int)(time()/60);//get time in minute from 1970
       $string = md5($time);//hashing
       $key = hash('sha256', $time.$key);//creating our key
       $secret = hash_hmac('sha256', $string, $key);//final hash using sha-256 algorithm
       return $secret; 
   }
?>