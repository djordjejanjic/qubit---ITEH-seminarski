<?php
session_start();
include "../konekcija.php";

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count="";
$ans="";

$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];
}

$res=mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]' && question_no=$_GET[questionno]");

$count=mysqli_num_rows($res);

if($count==0)
{
    echo "over";
}
else{
    while($row=mysqli_fetch_array($res))
    {
        $question_no=$row["question_no"];
        $question=$row["question"];
        $opt1=$row["option1"];
        $opt2=$row["option2"];
        $opt3=$row["option3"];
        $opt4=$row["option4"];
    }
    ?>
    <br>
    <table style="margin:auto;">
        <tr>
            <td style="font-weight: bold; color:white; font-size: 35px; padding-left: 15px; padding-bottom:30px; font-family:'Coda', monospace;" colspan="2">
                <?php echo "( ".$question_no ." ) ". $question; ?>
            </td>
        </tr>
    </table>
    <table style="margin:auto; font-size: 50px; font-family:'Squada One', monospace;" colspan="2">
        
        <tr>
            <td style="padding-bottom: 30px;">
                <input type="radio" name="rl" id="rl" value="<?php echo $opt1; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>);"
                <?php
                    if($ans==$opt1)
                    {
                        echo "checked";
                    }
                   
                ?>>
            </td>
            <td style="padding-left: 10px; padding-bottom: 20px; color:white;">
                <?php
                if(strpos($opt1, 'images/')!=false)
                {
                    ?>
                    <img id="borderslike" src="admin/<?php echo $opt1; ?>" height="400" width="400">
                    <?php
                }else{
                    echo $opt1;
                }
                ?>
            </td>
        

            <td style="padding-left: 100px; padding-bottom: 30px;">
                <input type="radio" name="rl" id="rl" value="<?php echo $opt2; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>);"
                <?php
                    if($ans==$opt2)
                    {
                        echo "checked";
                    }
                   
                ?>>
            </td>
            <td style="padding-left: 10px; padding-bottom: 20px;color:white;">
                <?php
                if(strpos($opt2, 'images/')!=false)
                {
                    ?>
                    <img id="borderslike" src="admin/<?php echo $opt2; ?>" height="400" width="400">
                    <?php
                }else{
                    echo $opt2;
                }
                ?>
            </td>
        </tr>
        
        <tr>
            <td style="padding-bottom: 30px;">
                <input type="radio" name="rl" id="rl" value="<?php echo $opt3; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>);"
                <?php
                    if($ans==$opt3)
                    {
                        echo "checked";
                    }
                   
                ?>>
            </td>
            <td style="padding-left: 10px; padding-bottom: 20px;color:white;">
                <?php
                if(strpos($opt3, 'images/')!=false)
                {
                    ?>
                    <img id="borderslike" src="admin/<?php echo $opt3; ?>" height="400" width="400">
                    <?php
                }else{
                    echo $opt3;
                }
                ?>
            </td>
    
            <td style="padding-left: 100px;padding-bottom: 30px;">
                <input type="radio" name="rl" id="rl" value="<?php echo $opt4; ?>" onclick="radioclick(this.value, <?php echo $question_no; ?>);"
                <?php
                    if($ans==$opt4)
                    {
                        echo "checked";
                    }
                   
                ?>>
            </td>
            <td style="padding-left: 10px; padding-bottom: 20px;color:white;">
                <?php
                if(strpos($opt4, 'images/')!=false)
                {
                    ?>
                    <img id="borderslike" src="admin/<?php echo $opt4; ?>" height="400" width="400">
                    <?php
                }else{
                    echo $opt4;
                }
                ?>
            </td>
        </tr>
    </table>

    <?php
}

?>