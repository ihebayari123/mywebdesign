<?php
    include '../../Controller/ForumController.php';

    $postC = new PostController();
    $postC->deletePost($_GET['id']);
    
    header('Location:indexposts.php');



?>




