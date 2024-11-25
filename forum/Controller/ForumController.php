<?php
include(__DIR__ . '/../config.php');
include(__DIR__ . '/../Model/Forum.php');

class PostController {
    public function listPosts($page = 1, $perPage = 7) {
        $offset = ($page - 1) * $perPage;  // Calculate offset
    
        $sql = "SELECT * FROM post LIMIT :limit OFFSET :offset";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':limit', $perPage, PDO::PARAM_INT);
            $query->bindValue(':offset', $offset, PDO::PARAM_INT);
            $query->execute();
            $list = $query->fetchAll();
            return $list;
        } catch(Exception $err) {
            echo $err->getMessage();
        }
    }

    public function getTotalPosts() {
        $sql = "SELECT COUNT(*) FROM post";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $total = $query->fetchColumn();
            return $total;
        } catch(Exception $err) {
            echo $err->getMessage();
        }
    }
    
    

    public function addPost($post) {
        $sql = "INSERT INTO post (title, content, created_at, author) 
                VALUES (:title, :content, NOW(), :author)";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'author' => $post->getAuthor()
            ]);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function updatePost($post) {
        $sql = "UPDATE post 
                SET title = :title, content = :content, author = :author, updated_at = NOW() 
                WHERE id = :id";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'author' => $post->getAuthor()
            ]);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function deletePost($id) {
        $sql = "DELETE FROM post WHERE id = :id";
        $db = config::getConnexion();

        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);

        try {
            $query->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getPost($id) {
        $sql = "SELECT * FROM post WHERE id = :id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);

        try {
            $query->execute();
            $post = $query->fetch();
            return $post;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    // Add Comment to a Post
    public function addComment($comment) {
        $sql = "INSERT INTO comment (post_id, comment_title, content, created_at, author) 
                VALUES (:post_id, :comment_title, :content, NOW(), :author)";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'post_id' => $comment->getPostId(),
                'comment_title' => $comment->getCommentTitle(),
                'content' => $comment->getcommentContent(),
                'author' => $comment->getcommentAuthor()
            ]);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // List Comments for a Post
    public function listComments($postId) {
        $sql = "SELECT * FROM comment WHERE post_id = :post_id";
        $db = config::getConnexion();
        $query = $db->prepare($sql);
        $query->bindValue(':post_id', $postId);

        try {
            $query->execute();
            $comments = $query->fetchAll();
            return $comments;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    // Update a Comment
    public function updateComment($comment) {
        $sql = "UPDATE comment 
                SET comment_title = :comment_title, content = :content, author = :author, updated_at = NOW() 
                WHERE id = :id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $comment->getId(),
                'comment_title' => $comment->getCommentTitle(),
                'content' => $comment->getcommentContent(),
                'author' => $comment->getcommentAuthor()
            ]);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // Delete a Comment
    public function deleteComment($id) {
        $sql = "DELETE FROM comment WHERE id = :id";
        $db = config::getConnexion();

        $query = $db->prepare($sql);
        $query->bindValue(':id', $id);

        try {
            $query->execute();
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>
