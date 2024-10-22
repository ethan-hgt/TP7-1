<?php
require_once('src/lib/database.php');
require_once('src/model/post.php');

use Application\Model\Post\PostRepository;

function homepage()
{
    $postRepository = new PostRepository();
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();
    require('templates/homepage.php');
}