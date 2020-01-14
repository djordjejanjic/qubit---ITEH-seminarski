<?php
    include "header.php";
    include "../konekcija.php";

    $id = $_GET["id"];
    $exam_category = '';
    $res = mysqli_query($link, "select * from exam_category where id=$id");
    while($row = mysqli_fetch_array($res))
    {
    $exam_category = $row["category"];
    }
?>
        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dodaj pitanje u kategoriju: "<?php echo $exam_category; ?>"</h1>
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
                            <div class="col-lg-6">
                            <div class="card">
                            <div class="card-header"><strong>Dodaj tekstualno pitanje</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Pitanje</label><input type="text" class="form-control" name="question" placeholder="Dodaj novo pitanje"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 1</label><input type="text" class="form-control" name="opt1" placeholder="Dodaj opciju 1"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 2</label><input type="text" class="form-control" name="opt2" placeholder="Dodaj opciju 2"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 3</label><input type="text" class="form-control" name="opt3" placeholder="Dodaj opciju 3"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Opcija 4</label><input type="text" class="form-control" name="opt4" placeholder="Dodaj opciju 4"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Tačan odgovor</label><input type="text" class="form-control" name="answer" placeholder="Dodaj odgovor"></div>
                                
                                <div class="form-group">         
                                    <input type="submit" name="submit1" value="Dodaj pitanje" class="btn btn-success">                                  
                                </div>                      
                             </div>
                        </div>       
                    </div>
                     <div class="col-lg-6">   
                        <div class="card">
                            <div class="card-header"><strong>Dodaj pitanje sa fotografijama</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Pitanje</label><input type="text" class="form-control" name="fquestion" placeholder="Dodaj novo pitanje"></div>
                                   <div class="form-group"><label for="company" class=" form-control-label">Opcija 1</label><input type="file" class="form-control" name="fopt1" style="padding-bottom:35px;"></div>
                                    <div class="form-group"><label for="company" class=" form-control-label">Opcija 2</label><input type="file" class="form-control" name="fopt2" style="padding-bottom:35px;"></div>
                                     <div class="form-group"><label for="company" class=" form-control-label">Opcija 3</label><input type="file" class="form-control" name="fopt3" style="padding-bottom:35px;"></div>
                                        <div class="form-group"><label for="company" class=" form-control-label">Opcija 4</label><input type="file" class="form-control" name="fopt4" style="padding-bottom:35px;"></div>
                                            <div class="form-group"><label for="company" class=" form-control-label">Tačan odgovor</label><input type="file" class="form-control" name="fanswer" style="padding-bottom:35px;"></div>
                                             <div class="form-group">
                                               <input type="submit" name="submit2" value="Dodaj pitanje" class="btn btn-success">
                                             </div>
                                         </div>
                                      </div>
                                   </div>
                                </form>   
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card"> 
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>No</th>
                                        <th>Pitanja</th>
                                        <th>Opcija 1</th>
                                        <th>Opcija 2</th>
                                        <th>Opcija 3</th>
                                        <th>Opcija 4</th>
                                        <th>Izmeni</th>
                                        <th>Izbriši</th>
                                    </tr>
                                
                                
                                <?php
                                    
                                    $res = mysqli_query($link, "SELECT * FROM questions where category = '$exam_category' ORDER BY question_no ASC");
                                    while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                        echo "<td>"; echo $row["question_no"]; echo "</td>";
                                        echo "<td>"; echo $row["question"]; echo "</td>";
                                        echo "<td>"; 

                                        if(strpos($row["option1"], 'opt_images/')!==false)
                                        {
                                            ?>
                                            <img src="<?php echo $row["option1"]; ?>" height="50" width="50">
                                            <?php 
                                        }else{
                                            echo $row["option1"];
                                        }
                                        
                                        echo "</td>";
                                        echo "<td>";
                                        
                                        if(strpos($row["option2"], 'opt_images/')!==false)
                                        {
                                            ?>
                                            <img src="<?php echo $row["option2"]; ?>" height="50" width="50">
                                            <?php 
                                        }else{
                                            echo $row["option2"];
                                        }

                                        echo "</td>";
                                        echo "<td>";
                                        
                                        if(strpos($row["option3"], 'opt_images/')!==false)
                                        {
                                            ?>
                                            <img src="<?php echo $row["option3"]; ?>" height="50" width="50">
                                            <?php 
                                        }else{
                                            echo $row["option3"];
                                        }
                                        echo "</td>";
                                        echo "<td>";
                                        
                                        if(strpos($row["option4"], 'opt_images/')!==false)
                                        {
                                            ?>
                                            <img src="<?php echo $row["option4"]; ?>" height="50" width="50">
                                            <?php 
                                        }else{
                                                echo $row["option4"];
                                        }
                                        echo "</td>";
                                        
                                        echo "<td>";
                                        if(strpos($row["option4"], 'opt_images/')!==false)
                                        {
                                            ?>
                                            <a href="edit_option_images.php?id=<?php echo $row["id"]; ?>">Izmeni</a>
                                            <?php 
                                        }else{
                                            ?>
                                            <a href="edit_option.php?id=<?php echo $row["id"]; ?>">Izmeni</a>
                                            <?php
                                        }
                                        echo "</td>";

                                        echo "<td>";
                                        ?>
                                        <a href="delete_option.php?id=<?php echo $row["id"]; ?>">Izbriši</a>
                                        <?php
                                        echo "</td>";

                                        echo "<tr>";
                                    }

                               
                                 ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
<?php

if(isset($_POST['submit1']))
{
    $loop = 0;
    
    $brojac = 0;
    
    $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
    
    $brojac = mysqli_num_rows($res);
    
    if($brojac == 0)
    {
        
    } else {
        while($row = mysqli_fetch_array($res))
        {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no='$loop' where id = $row[id]");
        }
    }
    
    $loop = $loop + 1;
    mysqli_query($link, "insert into questions values(NULL, '$loop', '$_POST[question]','$_POST[opt1]','$_POST[opt2]', '$_POST[opt3]', '$_POST[opt4]', '$_POST[answer]', '$exam_category')") or die(mysqli_error($link));
    
    ?>
<script type=text/javascript>
    alert("Pitanje dodato!");
    window.location.href = window.location.href;
</script>

<?php
    
}
?>

<?php

if(isset($_POST['submit2']))
{
    $loop = 0;
    
    $brojac = 0;
    
    $res = mysqli_query($link, "select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($link));
    
    $brojac = mysqli_num_rows($res);
    
    if($brojac == 0)
    {
        
    } else {
        while($row = mysqli_fetch_array($res))
        {
            $loop = $loop + 1;
            mysqli_query($link, "update questions set question_no='$loop' where id = $row[id]");
        }
    }
    
    $loop = $loop + 1;
    
    $tm = md5(time());
    $fnm1=$_FILES["fopt1"]["name"];
    $dst1="./opt_images/".$tm.$fnm1;
    $dst_db1="opt_images/".$tm.$fnm1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"], $dst1);
    
   
    $fnm2=$_FILES["fopt2"]["name"];
    $dst2="./opt_images/".$tm.$fnm2;
    $dst_db2="opt_images/".$tm.$fnm2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"], $dst2);
    
   
    $fnm3=$_FILES["fopt3"]["name"];
    $dst3="./opt_images/".$tm.$fnm3;
    $dst_db3="opt_images/".$tm.$fnm3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"], $dst3);
    
  
    $fnm4=$_FILES["fopt4"]["name"];
    $dst4="./opt_images/".$tm.$fnm4;
    $dst_db4="opt_images/".$tm.$fnm4;
    move_uploaded_file($_FILES["fopt4"]["tmp_name"], $dst4);
    
    
    $fnm5=$_FILES["fanswer"]["name"];
    $dst5="./opt_images/".$tm.$fnm5;
    $dst_db5="opt_images/".$tm.$fnm5;
    move_uploaded_file($_FILES["fanswer"]["tmp_name"], $dst5);
    
    mysqli_query($link, "insert into questions values(NULL, '$loop', '$_POST[fquestion]','$dst_db1','$dst_db2','$dst_db3', '$dst_db4', '$dst_db5','$exam_category')") or die(mysqli_error($link));
    
    ?>
<script type=text/javascript>
    alert("Pitanje dodato!");
    window.location.href = window.location.href;
</script>

<?php   
}
?>

<?php
  include "footer.php";      
?>