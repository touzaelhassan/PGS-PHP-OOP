<?php

function class_auto_loader($class)
{

  $class = strtolower($class);
  $path = "includes/{$class}.php";

  if (file_exists($path)) {
    require_once($path);
  } else {
    die("This file name {$class}.php was not found !!");
  }
}

spl_autoload_register('class_auto_loader');
