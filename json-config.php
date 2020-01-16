<?php
$message = '';
$error = '';
if(isset($_POST["submit1"]))
{
    if(empty($_POST["firstname"]))
    {
        $error="<label>Upiši ime!</label>";    
    }
    else if(empty($_POST["lastname"]))
    {
        $error="<label>Upiši prezime!</label>";
    }
    else if(empty($_POST["username"]))
    {
        $error="<label>Upiši korisnicko ime!</label>";
    }
    else if(empty($_POST["password"]))
    {
        $error="<label>Upiši sifru!</label>";
    }
    else if(empty($_POST["email"]))
    {
        $error="<label>Upiši email!</label>";
    }
    else{
        if(file_exists('user_data.json'))
        {
            $current_data = file_get_contents('user_data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email'] 
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if(file_put_contents('user_data.json', $final_data))
            {
                $message = "USPEŠNO";
            }
        }else{
            $error = 'JSON Fajl ne postoji';
        }
    }
}
?>