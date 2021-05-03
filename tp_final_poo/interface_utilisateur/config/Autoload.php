<?php
function chargerClasse($classname)
{
    require 'classe/'.$classname . '.php';
}
spl_autoload_register('chargerClasse');