<?php
    include 'db_connect.php';
    function dateFormatter($date)
    {
        $day = substr($date,0,1);
        $month = substr($date,3,4);
        $year = substr($date,6,9);
        return $year."/".$month."/".$day;

    }

    function checkBalance($account_number){
        $balance_check_query = "SELECT * FROM account";
        $result = mysqli_query($conn, $balance_check_query);
        $customer = mysqli_fetch_assoc($result);
        if($customer){
            echo $customer['interest'];

        }else{
            echo "Invalid Account Number: ".$customer;
        }
    }

?>