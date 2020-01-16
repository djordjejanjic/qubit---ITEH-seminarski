<?php
include "konekcija.php";
$result = $link->query("SELECT * FROM posts");
?> 

<div>
<?php

while($post = $result->fetch_assoc()){ ?>
    <div class="postsform">
    <h1 class="titlepost"><?= $post['title'] ?></h1>
    <div class="bodypost">
    <?= $post['body'] ?>
    <div class="authorpost" style="padding-top:20px;">Autor: <?= $post['author'] ?></div>
    </div>
    </div>
<?php
}
?>
