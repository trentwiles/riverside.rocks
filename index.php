<?php

require __DIR__ . "/vendor/autoload.php";





$o = trim(file_get_contents("ONIONPLACE"));
$r = $_SERVER['REQUEST_URI'];
header("x-powered-by: Kali Linux (Vangaurd Edition)");
header("x-cease-and-desisted-by: Bisect Hosting");
header("onion-location: $o");

$router = new \Bramus\Router\Router();

$ipb = json_decode(file_get_contents("blacklist.json"), true);
if(in_array($_SERVER ['REMOTE_ADDR'], $ipb))
{
  require '403.php';
  die();
}

if($_SERVER['HTTP_USER_AGENT'] == "Mozilla/5.0 (Windows NT 6.1; rv:60.0) Gecko/20100101 Firefox/60.0"){
   die("<i><h3>Hello,</h3></i><br>Please do not use our site over Tor2Web. For the best anonymity, please <a href='https://www.torproject.org/download/'>download Tor.</a>");
}

if($_SERVER['HTTP_X_TOR2WEB'])
{
   die("<i><h3>Hello,</h3></i><br>Please do not use our site over Tor2Web. For the best anonymity, please <a href='https://www.torproject.org/download'>download Tor</a>");
}
$router->get('/', function() {
    echo file_get_contents("home.html");
});

$router->post('/', function() {
    require 'reddit-post.php';
});

$router->get('/discord', function() {
    header("Location: https://discord.gg/EaCmmu25cd");
});

$router->get('/matrix', function() {
    header("Location: https://matrix.to/#/#riversiderocks:matrix.org");
});

$router->get('/services', function() {
    echo file_get_contents("services.html");
});

$router->get('/bot', function() {
    echo "We are going to be requesting domain names to check if they are alive for research. To opt out, please contact support@riverside.rocks";
});

//$router->get('/about', function() {
//    echo file_get_contents("about.html");
//});

$router->get('/vpn', function() {
    echo file_get_contents("vpn.html");
});

$router->get('/videos', function() {
   header("Location: https://www.youtube.com/riversiderocks");
   //echo "Something went wrong, try again later?";
});

$router->get('/about/contact', function() {
    echo file_get_contents("contact.html");
});

$router->post('/about/contact', function() {
    require "contact-backend.php";
});

$router->post('/tor', function() {
    require "tor.php";
});

//$router->get('/projects', function() {
//    echo file_get_contents("projects.html");
//});

$router->get('/about/status', function() {
    echo header("Location: /vnstat/app/index.php");
});

$router->get('/about/hacking', function() {
    echo file_get_contents("hacking.html");
});

$router->get('/about/legal', function() {
    header("Location: https://wiki.riverside.rocks/index.php/Terms_of_service");
});

$router->get('/5xx', function() {
    require '503.php';
});

$router->set404(function() {
    header('HTTP/1.1 404 Not Found');
    echo file_get_contents("404.html");
});

$router->run();
