<?php
include('/../config.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    $postId = $_POST['post_id'];
    $author = $_POST['author'];

    try {
        $pdo = config::getConnexion();
        // Prepare the SQL query to insert the new comment
        $stmt = $pdo->prepare("INSERT INTO comment (post_id, content, author, created_at) 
                               VALUES (:post_id, :content, :author, NOW())");
        // Execute the query with the form values
        $stmt->execute([
            'post_id' => $postId,
            'content' => $content,
            'author' => $author
        ]);

        // Redirect back to the forum page after adding the comment
        header("Location: forum.php");
        exit;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}
?>
