<?php
session_start();
include "header.php";
include "konekcija.php";
?>

<div class="row" style="margin-top: 50px; padding:0px; margin-bottom: 50px;">         
<div class="col-lg-6 col-lg-push-3" style="min-height: 700px;">

    <h1 style="text-align: center; color:white; font-size:50px; margin-bottom:20px; font-family:'VT323', monospace;">Istorija rezultata</h1>

    <?php
    $res=mysqli_query($link, "SELECT * FROM exam_results WHERE username='$_SESSION[username]' ORDER BY id DESC");
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
        echo "<tr style='background:linear-gradient(207deg, rgba(2,0,36,1) 0%, rgba(3,31,85,1) 41%, rgba(14,57,93,1) 100%);'>";
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
</div>

<?php
include "footer.php";
?>