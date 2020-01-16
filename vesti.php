<?php
session_start();
include "header.php";
include "konekcija.php";
?>

<div class="row" style="margin-top: 50px; padding:0px; margin-bottom: 50px;">         
<div class="col-lg-8 col-lg-push-2" style="min-height: 700px;">

<h1 id="novevestih">O ovome se priča</h1>

<?php
include "select_posts.php";
?>

</div>        
</div>
</div>

<?php
include "footer.php";
?>