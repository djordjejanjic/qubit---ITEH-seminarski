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
                            
                            <div class="card-body">
                            
                            <form name="form1" action="" method="post" enctype="multipart/form-data">
                            <div class="col-lg-12">
                            <div class="card">
                            <div class="card-header"><strong>Izmeni izabrano pitanje</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Pitanje</label><input type="text" class="form-control" name="question" value="<?php echo $question; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 1</label><input type="text" class="form-control" name="opt1" value="<?php echo $opt1; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 2</label><input type="text" class="form-control" name="opt2" value="<?php echo $opt2; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 3</label><input type="text" class="form-control" name="opt3" value="<?php echo $opt3; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 4</label><input type="text" class="form-control" name="opt4" value="<?php echo $opt4; ?>"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Tačan odgovor</label><input type="text" class="form-control" name="answer" value="<?php echo $answer; ?>"></div>
                                
                                <div class="form-group">         
                                    <input type="submit" name="submit1" value="Izmeni pitanje" class="btn btn-success">                                  
                                </div>                      
                             </div>
                        </div>   
                        </form>
                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
            
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "UPDATE questions SET question='$_POST[question]', option1='$_POST[opt1]', option2='$_POST[opt2]', option3='$_POST[opt3]', option4='$_POST[opt4]', answer='$_POST[answer]' WHERE id = $id");
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