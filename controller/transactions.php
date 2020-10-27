<?php
include ('db_connect.php');
$server_name = "18.206.243.25";
$user_name = "ibanking";
$password = "Delta@1234";
$database_name = "ibanking";
// Create connection
$conn = new mysqli($server_name, $user_name, $password,$database_name);

$account_number = $_SESSION['account_number'];
$query = "SELECT * FROM transaction WHERE sender_acc_number= $account_number";

if ($result = $conn->query($query)) {

    /* fetch object array */
    while ($row = mysqli_fetch_assoc($result)){

        //echo $row['id']. $row['amount']. $row['description']. $row['description']. $row['sender_acc_number']. $row['receiver_acc_number'];
        ?>

            <tr>
                <th scope="row"><?php echo $row['timestamp']?></th>
                <td>Debit</td>
                <td><?php echo "$". number_format($row['amount']) ?></td>
                <td>$2700</td>
                <td>Processed</td>
                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
            </tr>

       <?php

    }

    /* free result set */
    $result->close();

}


?>