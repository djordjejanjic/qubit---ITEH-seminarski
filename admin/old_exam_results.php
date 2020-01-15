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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Rezultati svih korisnika</h1>
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
                             
                            <h1 style="text-align: center; color:white; font-size:50px; margin-bottom:20px; font-family:'VT323', monospace;">Istorija rezultata</h1>

<?php
$res=mysqli_query($link, "SELECT * FROM exam_results ORDER BY id DESC");
$count=mysqli_num_rows($res);


if($count==0)
{
    ?>
    <center>
        <h1 style="font-size:50px; margin-top:30px; font-family:'VT323', monospace;">Nema rezultata, niste nijednom igrali!</h1>
    </center
    <?php
}
else{
    echo "<table id='rezultati' class='table table-bordered'>";
    echo "<tr>";
    echo "<th style='text-align:center;'>"; echo "Korisničko ime"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Oblast"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Broj pitanja"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Tačni odgovori"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Netačni odgovori"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Vreme rada"; echo "</th>";
    echo "</tr>";
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td>"; echo $row["username"]; echo "</td>";
        echo "<td>"; echo $row["exam_type"]; echo "</td>";
        echo "<td>"; echo $row["total_question"]; echo "</td>";
        echo "<td>"; echo $row["correct_answer"]; echo "</td>";
        echo "<td>"; echo $row["wrong_answer"]; echo "</td>";
        echo "<td>"; echo $row["exam_time"]; echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

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