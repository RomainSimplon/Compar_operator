<?php
class Autoloader{

    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static  function autoload ($class_name){
        require 'interface_utilisateur/class/' .$class_name . '.php';
    }
}

