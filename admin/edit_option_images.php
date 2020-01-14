<?php
    include "header.php";
    include "../konekcija.php";

    $id=$_GET["id"];
    $id1=$_GET["id1"];

    $question="";
    $opt1="";
    $opt2="";
    $opt3="";
    $opt4="";
    $answer="";

    $res=mysqli_query($link, "SELECT * FROM questions WHERE id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $question=$row["question"];
        $opt1 = $row["option1"];
        $opt2 = $row["option2"];
        $opt3 = $row["option3"];
        $opt4 = $row["option4"];
        $answer = $row["answer"];
    }
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Izmeni pitanje</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                            <div class="col-lg-12">   
                            <div class="card">
                            <div class="card-header"><strong>Izmeni izabrano pitanje</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Pitanje</label><input type="text" class="form-control" name="fquestion" value="<?php echo $question; ?>"></div>
                                   <div class="form-group">
                                   <img src="<?php echo $opt1; ?>" height="50" width="50"><br>

                                   <label for="company" class=" form-control-label">Opcija 1</label><input type="file" class="form-control" name="fopt1" style="padding-bottom:35px;"></div>
                                    <div class="form-group">
                                    <img src="<?php echo $opt2; ?>" height="50" width="50"><br>

                                    <label for="company" class=" form-control-label">Opcija 2</label><input type="file" class="form-control" name="fopt2" style="padding-bottom:35px;"></div>
                                     <div class="form-group">
                                     <img src="<?php echo $opt3; ?>" height="50" width="50"><br>

                                     <label for="company" class=" form-control-label">Opcija 3</label><input type="file" class="form-control" name="fopt3" style="padding-bottom:35px;"></div>
                                        <div class="form-group">
                                        <img src="<?php echo $opt4; ?>" height="50" width="50"><br>
                                        
                                        <label for="company" class=" form-control-label">Opcija 4</label><input type="file" class="form-control" name="fopt4" style="padding-bottom:35px;"></div>
                                            <div class="form-group">
                                            <img src="<?php echo $answer; ?>" height="50" width="50"><br>

                                            <label for="company" class=" form-control-label">Tačan odgovor</label><input type="file" class="form-control" name="fanswer" style="padding-bottom:35px;"></div>
                                             <div class="form-group">
                                               <input type="submit" name="submit2" value="Izmeni pitanje" class="btn btn-success">
                                             </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                            </form>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php
if(isset($_POST["submit2"]))
{
   
    $opt1=$_FILES["fopt1"]["name"];
    $opt2=$_FILES["fopt2"]["name"];
    $opt3=$_FILES["fopt3"]["name"];
    $opt4=$_FILES["fopt4"]["name"];
    $answer=$_FILES["fanswer"]["name"];

    $tm = md5(time());

    if($opt1!="")
    {
        $dst1="./opt_images/".$tm.$opt1;
        $dst_db1="opt_images/".$tm.$opt1;
        move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);

        mysqli_query($link, "UPDATE questions SET question='$_POST[fquestion]', option1='$dst_db1' WHERE id=$id");
    }

    if($opt2!="")
    {
        $dst2="./opt_images/".$tm.$opt2;
        $dst_db2="opt_images/".$tm.$opt2;
        move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);

        mysqli_query($link, "UPDATE questions SET question='$_POST[fquestion]', option2='$dst_db2' WHERE id=$id");
    }
    if($opt3!="")
    {
        $dst3="./opt_images/".$tm.$opt3;
        $dst_db3="opt_images/".$tm.$opt3;
        move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);

        mysqli_query($link, "UPDATE questions SET question='$_POST[fquestion]', option3='$dst_db3' WHERE id=$id");
    }
    if($opt4!="")
    {
        $dst4="./opt_images/".$tm.$opt4;
        $dst_db4="opt_images/".$tm.$opt4;
        move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);

        mysqli_query($link, "UPDATE questions SET question='$_POST[fquestion]', option4='$dst_db4' WHERE id=$id");
    }
    if($answer!="")
    {
        $dst5="./opt_images/".$tm.$answer;
        $dst_db5="opt_images/".$tm.$answer;
        move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);

        mysqli_query($link, "UPDATE questions SET question='$_POST[fquestion]', answer='$dst_db5' WHERE id=$id");
    }
    mysqli_query($link, "UPDATE questions SET question='$_POST[fquestion]' WHERE id=$id");

    ?>
    <script type="text/javascript">
        window.location="add_edit_questions.php?id=<?php echo $id1; ?>";
    </script>
    <?php

}
?>

<?php
  include "footer.php";      
?>