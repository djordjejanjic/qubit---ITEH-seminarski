<?php
include "../konekcija.php";

$id=$_GET["id"];
$id1=$_GET["id1"];

mysqli_query($link, "DELETE FROM questions WHERE id=$id");

?>

<script type="text/javascript">
    window.location="add_edit_questions.php?id=<?php echo $id1; ?>";
</script>