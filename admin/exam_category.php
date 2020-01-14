<?php
    include "header.php";
    include "../konekcija.php"
?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Upravljanje oblastima</h1>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form name="form1" action="" method="post">
                            <div class="card-body">
                                <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><strong>Dodaj novu oblast</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="company" class=" form-control-label">Nova oblast</label><input type="text" class="form-control" name="examname" placeholder="Dodaj novu oblast"></div>
                                    <div class="form-group"><label class=" form-control-label">Vreme nove oblasti</label><input type="text"  class="form-control" name="examtime" placeholder="Vreme u minutima"></div>
                                
                                <div class="form-group">
                                    
                                    <input type="submit" name="submit1" value="Dodaj oblast" class="btn btn-success">
                                    
                                </div>
                                       
                             </div>
                        </div>
                    </div>
                                
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Oblasti</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Naziv oblasti</th>
                                            <th scope="col">Vreme trajanja</th>
                                            <th scope="col">Izmeni oblast</th>
                                            <th scope="col">Izbriši oblast</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                        $brojac = 0;
                                        $res=mysqli_query($link, "select * from exam_category");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                           $brojac = $brojac + 1; 
                                        
                                        ?>
                                        
                                        <tr>
                                            <th scope="row"><?php echo $brojac;?></th>
                                            <td><?php echo $row["category"]; ?></td>
                                            <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                            <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>">Izmeni</a></td>
                                            <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Izbriši</a></td>
                                        </tr>
                                        
                                        <?php
                                        }    
                                        ?>
                                       
                                    </tbody>
                                </table>
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

if(isset($_POST['submit1']))
{
    mysqli_query($link, "insert into exam_category values(NULL, '$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));

?>
 <script type="text/javascript">
        alert("Nova oblast dodata!");
        window.location.href=window.location.href;
    </script>

<?php
    }
?>
   
<?php
  include "footer.php";      
?>