<?php
    include '../../Controller/ForumController.php';

    $postC = new PostController();
    
    // Get current page, default to 1 if not set
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $postsPerPage = 7;

    // Get posts for the current page
    $list = $postC->listPosts($currentPage, $postsPerPage);

    // Get the total number of posts and calculate total pages
    $totalPosts = $postC->getTotalPosts();
    $totalPages = ceil($totalPosts / $postsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Posts</title>
    <link rel="stylesheet" href="styles.css">
    <link href="style.css" rel="stylesheet">
</head>
<body>
   
    <div class="container">
        <!-- Table Structure -->
        <table class="posts-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Created At</th>
                    <th>Comments</th>
                    <th>Likes</th>
                    <th>Views</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $post) { ?>
                    <tr>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['content']; ?></td>
                        <td><?php echo $post['author']; ?></td>
                        <td><?php echo $post['created_at']; ?></td>
                        <td>18</td> <!-- Static Comment Count for now -->
                        <td>7</td>  <!-- Static Like Count for now -->
                        <td>5.2k</td> <!-- Static View Count for now -->
                        <td>
                            <a href="deleteForum.php?id=<?php echo $post['id']; ?>">Supprimer</a> 
                            <a href="updateForum.php?id=<?php echo $post['id']; ?>">Modifier</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="indexposts.php?page=<?php echo $currentPage - 1; ?>">&laquo; Previous</a>
            <?php endif; ?>

            <span>Page <?php echo $currentPage; ?> of <?php echo $totalPages; ?></span>

            <?php if ($currentPage < $totalPages): ?>
                <a href="indexposts.php?page=<?php echo $currentPage + 1; ?>">Next &raquo;</a>
            <?php endif; ?>
        </div>

                

    </div>
</body>
</html>
