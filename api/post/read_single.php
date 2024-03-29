<?php
/**
 * Created by PhpStorm.
 * User: pawan
 * Date: 25/12/18
 * Time: 11:27 PM
 */
//headers
header('Access-Control-Allow-Origin: *');
header('Control-Type: application/json ');

include_once '../../config/Database.php';
include_once '../../models/Posts.php';

$database= new Database();

$db = $database->connect();

$post= new post($db);

$post->id=isset($_GET['id'])? $_GET['id'] : die();

$post->read_single();
$post_arr = array(
    'id'=>$post->id,
    'title'=>$post->title,
    'body'=>$post->body,
    'author'=>$post->author,
    'category_id'=>$post->category_id,
    'category_name'=>$post->category_name

);

print_r(json_encode($post_arr));