<?php

    #assigning empty character to the form variables
    $error = '';
    $name = '';
    $email = '';
    $dob = '';
    $gender = '';
    $country = '';

    #function format the inputed data
    function clean_text($string) {
        $string = trim($string);
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    #the if statement will execute if btn submit is click
    if(isset($_POST['submit'])) {
        $name = clean_text($_POST['name']);
        $email = clean_text($_POST['email']);
        $dob = clean_text($_POST['dob']);
        $gender = clean_text($_POST['gender']);
        $country = clean_text($_POST['country']);

        #the if statement will exwcute if no error occur
        if($error == ''){
            $file_open = fopen('userdata.csv', 'a');
            $user_data = array(
                'name' => $name,
                'email' => $email,
                'dob' => $dob,
                'gender' => $gender,
                'country' => $country
            );

            #creating a csv file
            fputcsv($file_open, $user_data);
            $name = '';
            $email = '';
            $dob = '';
            $gender = '';
            $country = '';
            
            #closing the csv file
            fclose($file_open);

            #displaying the user_data in array format
            print_r($user_data);
        }
    }
?>
