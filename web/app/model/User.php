<?php

class User extends fActiveRecord {

  public function passCheckOK($pass) {
    $passHash = self::calcPassword($pass, $this->getSalt(), $this->getIter());
    return $this->getPass() == $passHash;
  }

  public static function calcPassword($password, $salt, $iter){
    $pass = $password;
    for($i = 0; $i < $iter; $i++){
      $pass .= $salt;
      $pass = md5($pass);
    }
    return $pass;
  }

}