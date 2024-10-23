<?php
require_once('src/lib/database.php');
require_once('src/model/comment.php');

use Application\Model\Comment\CommentRepository;

function updateComment(string $identifier, ?array $input, string $post_id)
{
    if ($input === null) {
        $commentRepository = new CommentRepository();
        $commentRepository->connection = new DatabaseConnection();
        $comment = $commentRepository->getComment($identifier);
        
        require('templates/update_comment.php');
        
    } else {
        if (!empty($input['author']) && !empty($input['comment'])) {
            $author = $input['author'];
            $comment = $input['comment'];

            $commentRepository = new CommentRepository();
            $commentRepository->connection = new DatabaseConnection();
            $success = $commentRepository->updateComment($identifier, $author, $comment);
            
            if (!$success) {
                throw new Exception('Impossible de modifier le commentaire !');
            } else {
                header('Location: index.php?action=post&id=' . $post_id);
            }
        } else {
            throw new Exception('Les données du formulaire sont invalides.');
        }
    }
}