<?php

namespace Models;

// plus besoin de require quand parle d'une class car autoload s'en charge!!
//require_once('libraries/models/Model.php');

class User extends Model{
protected $table = "users";
}

?>