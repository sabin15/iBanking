<?php
include ('db_connect.php');
$server_name = "18.206.243.25";
$user_name = "ibanking";
$password = "Delta@1234";
$database_name = "ibanking";
// Create connection
$conn = new mysqli($server_name, $user_name, $password,$database_name);

$account_number = $_SESSION['account_number'];
$query = "SELECT * FROM transaction WHERE sender_acc_number= $account_number OR receiver_acc_number= $account_number ORDER BY timestamp DESC";

if ($result = $conn->query($query)) {

    /* fetch object array */
    while ($row = mysqli_fetch_assoc($result)){
        if($row['sender_acc_number'] == $account_number){
            $type = "Debit";
            $color = "#d70206";
        }
        if($row['receiver_acc_number'] == $account_number){
            $type = "Credit";
            $color = "#28a745";
        }
    


        //echo $row['id']. $row['amount']. $row['description']. $row['description']. $row['sender_acc_number']. $row['receiver_acc_number'];
        ?>

            <tr>
                <th scope="row"><?php echo $row['timestamp']?></th>
                <td style="color:<?php echo $color; ?>"><?php echo $type; ?></td>
                <td><?php echo "$". number_format($row['amount']) ?></td>
                <td>Processed</td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="trans<?php echo $row['id']?>">View</button></td>
            </tr>

            <script>
                $(document).ready(function() {
                    $("#trans<?php echo $row['id']?>").click(function(e) {
                        //alert('Success');
                        document.getElementById("trans_id").textContent="<?php echo $row['id']?>";
                        document.getElementById("trans_date").textContent="<?php echo $row['timestamp']?>";
                        document.getElementById("trans_amount").textContent="<?php echo $row['amount']?>";
                        document.getElementById("sender_acc_number").textContent="<?php echo $row['sender_acc_number']?>";
                        document.getElementById("receiver_acc_number").textContent="<?php echo $row['receiver_acc_number']?>";
                        
                       
                    });
                });

            </script>

       <?php

    }

    /* free result set */
    $result->close();

}


?>