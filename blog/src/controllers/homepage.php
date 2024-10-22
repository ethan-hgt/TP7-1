<?php
require_once('src/model/post.php');

function homepage()
{
    $postRepository = new PostRepository();
    $posts = getPosts($postRepository);
    require('templates/homepage.php');
}