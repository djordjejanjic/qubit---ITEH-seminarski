<?php
include "../konekcija.php";
$res=mysqli_query($link, "SELECT * FROM exam_results");

if(isset($_POST["generisi"]))
{
if(file_exists('user_results.json'))
        {
            while($row=mysqli_fetch_array($res)){
            $current_data = file_get_contents('user_results.json');
            $array_data = json_decode($current_data, true);
            
            
                    $extra = array(
                    'username' => $row['username'],
                    'exam_type' => $row['exam_type'],
                    'total_question' => $row['total_question'],
                    'correct_answer' => $row['correct_answer'],
                    'wrong_answer' => $row['wrong_answer'],
                    'exam_time' => $row['exam_time']
                
            );
        
        
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if(file_put_contents('user_results.json', $final_data))
            {
                $message = "USPEŠNO";
            }
        }
        }else{
            $error = 'JSON Fajl ne postoji';
        }
 }
?>