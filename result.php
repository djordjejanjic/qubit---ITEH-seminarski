<?php
session_start();
include "konekcija.php";
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
include "header.php";
?>

<div class="row" style="margin-top: 50px; padding:0px; margin-bottom: 50px;">         
<div class="col-lg-6 col-lg-push-3" style="min-height: 700px;">

    <?php
        $correct=0;
        $wrong=0;
        if(isset($_SESSION["answer"]))
        {
            for($i=1; $i<=sizeof($_SESSION["answer"]); $i++)
            {
                $answer="";
                $res=mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]' && question_no=$i");
                while($row=mysqli_fetch_array($res))
                {
                    $answer=$row["answer"];
                }
                if(isset($_SESSION["answer"][$i]))
                {
                    if($answer==$_SESSION["answer"][$i])
                    {
                        $correct = $correct+1;
                    }else{
                        $wrong = $wrong+1;
                    }
                }
                else{
                    $wrong = $wrong+1;
                }
            }
        }

        $count = 0;
        $res = mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]'");
        $count=mysqli_num_rows($res);
        $wrong=$count-$correct;
        $percentage = ($correct/$count)*100;

        echo "<br>"; echo "<br>";
        echo "<center class='centriraj'>";
        echo "Ukupan broj pitanja: ".$count;
        echo "<br>";
        echo "Broj tačnih odgovora: ".$correct;
        echo "<br>";
        echo "Broj pogrešnih odgovora: ".$wrong; 
        echo "<br>";
        echo "<br>";
       
        if($percentage==0 || $count==0)
        {
            echo "Morate još mnogo toga naučiti o našem Univerzumu!";
        }
        else if($percentage>0 && $percentage<20)
        {
            echo "Probajte još jednom, deluje da ste na sreću pogodili poneko pitanje!";
        }
        else if($percentage>=20 && $percentage<50)
        {
            echo "Podloga za učenje novih zanimljivih činjenica je tu, ali morate se potruditi!";
        }
        else if($percentage>=50 && $percentage<70){
            echo "Solidan rezultat! Vidi se da ste se interesovali za naš Univerzum!";
        }
        else if($percentage>=70 && $percentage < 95)
        {
            echo "Svaka čast, odličan rezultat! Prilično dobro razumete i informisani ste o našem Univerzumu!";
        }
        else{
            echo "WOW! Izgleda da ste opremljeni ogromnim znanjem iz Astronomije! Samo tako nastavite!";
        }
        echo "<br>";
        
        echo "</center>";   

    ?>
    

</div>        
</div>

<?php
if(isset($_SESSION["exam_start"]))
{
    $date = date("Y-m-d");
    mysqli_query($link, "INSERT INTO exam_results(id, username, exam_type, total_question, correct_answer, wrong_answer, exam_time) VALUES (NULL, '$_SESSION[username]', '$_SESSION[exam_category]', '$count', '$correct', '$wrong', '$date')");
}

if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"]);
    ?>
    <script type="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php

}
?>

<?php
include "footer.php";
?>