<?php
header("Content-Type: application/json");

$url = isset($_GET['url']) ? $_GET['url'] : "home";

switch($url){
    case "login":
        echo json_encode(["message" => "tout mache"]);
        break;
    default:
        echo json_encode(["message" => "ca marche pas"]);
}