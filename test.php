<?php
require 'vendor/autoload.php';
 $loader = new \Twig\Loader\FilesystemLoader('.\template\\');
 $twig = new \Twig\Environment($loader);
//  echo $twig->render('test.html', ['data' => 'truc']);
 echo $twig->render('test2.truc', ['data2' => 'hello world']);
?>