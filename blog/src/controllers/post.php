<?php
require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;

function post(string $identifier)
{
    $connection = new DatabaseConnection();
    
    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $post = $postRepository->getPost($identifier);
    
    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $comments = $commentRepository->getComments($identifier);
    
    require('templates/post.php');
}