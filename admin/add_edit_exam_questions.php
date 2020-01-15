<?php
session_start();
include "header.php";
include "../konekcija.php";
if(!isset($_SESSION["admin"]))
{
     ?>
    <script type="text/javascript">
        window.location="index.php";
    </script>
    <?php
}
?>
        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Izaberi oblast za upravljanje pitanjima</h1>
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
                             <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Naziv oblasti</th>
                                            <th scope="col">Vreme trajanja</th>
                                            <th scope="col">Izaberi</th>
                                           
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
                                            <td><a href="add_edit_questions.php?id=<?php echo $row["id"]; ?>">Izaberi</a></td>
                                           
                                        </tr>
                                        
                                        <?php
                                        }    
                                        ?>
                                       
                                    </tbody>
                                </table>
                                

                            </div>
                        </div> <!-- .card -->

                    </div>
                    <!--/.col-->
            
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php
  include "footer.php";      
?>