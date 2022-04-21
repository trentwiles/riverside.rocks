<?php

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");

echo file_get_contents("https://minecraft-api.com/api/ping/51.222.117.191/25588/json");
