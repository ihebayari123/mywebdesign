<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posts</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=search" />
</head>
<body>
    <nav class="navbar">
        <img class="logo" src="images/logo.png" alt="logo">
        <div class="nav_links">
            <ul>
                <li class="active"><a href="indexposts.php">Posts</a></li>
                <li><a href="#">Forum</a></li>
            </ul>
        </div>
    </nav>
    <form class="search_form">
        <div class="search">
            <span class="search_icon material-symbols-outlined">search</span>
            <input class="search-input" type="search" placeholder="Search">
        </div>
        <div>
          <button class="continue-application" id="new-discussion-btn">
          <div>
             <div class="pencil"></div>
              <div class="folder">
                 <div class="top">
                <svg viewBox="0 0 24 27">
                    <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                </svg>
              </div>
             <div class="paper"></div>
          </div>
          </div>
          Start New Discussion
          </button>
        </div>
 
        
    </form>

     <!-- Form container -->
  <div id="discussion-form-container" style="display: none;">
        <form action="addForum.php" method="POST" onsubmit="return validateForm()">
          <div class="inputGroup">
            <input id="title" type="text" name="title" required autocomplete="off">
            <label for="title">Discussion Title</label>
          </div>
          <div class="inputGroup">
            <input id="author" type="text" name="author" required autocomplete="off">
            <label for="author">Author</label>
          </div>
          <div class="inputGroup">
            <textarea id="content" name="content" required rows="3" autocomplete="off"></textarea>
            <label for="content">Content</label>
          </div>
          <button class="button">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                </svg>

  
                <div class="text">
              create new discussion
              </div>

            </button>
        </form>
    </div>
   
    

    <header>
    
    </header>
    <div class="bottom-image">
    <div class="forum-list-container">
        <?php include 'ForumList.php'; ?>
    </div>
</div>

    
</body>

<script src="work.js"></script>
</html>
