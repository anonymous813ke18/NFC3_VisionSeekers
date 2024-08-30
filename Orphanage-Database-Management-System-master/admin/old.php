<?php include './admin_components/admin_header.php' ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './admin_components/admin_top-menu.php' ?>

    <!-- BODY Content -->
    <div class="ui grid">
        <!-- Left menu -->
        <?php include './admin_components/admin_side-menu.php' ?>

        <!-- right content -->
        <div class="twelve wide column">
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">NGO</h1>


            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>CID</th>
                        <th>Name</th>
                        <th>Type Of NGO</th>
                        <th>Year of enrolled</th>
                        <th>Class</th>
                        <th>Inventory</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Example of session variables
// $_SESSION['role'] = 1; // or 2, 3, etc.
// $_SESSION['user_id'] = 123; // Example user ID
                    
                    // Check the role
                    if ($_SESSION['role'] == 1) {
                        // If role is 1, select all records
                        $sql = "SELECT * FROM old";
                    } else {
                        // If role is not 1, select records based on the user_id from the session
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM old WHERE cid = '$user_id'";
                    }

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // $unformated = $row['cdob'];
                            // $formateddate = date("d-m-Y", strtotime($unformated));
                            ?>

                            <tr>
                                <td><?php echo $row['cid']; ?></td>
                                <td><?php echo $row['cname']; ?></td>
                                <td><?php echo $row['typeOfNgo']; ?></td>
                                <td><?php echo $row['cyoe']; ?></td>
                                <td><?php echo $row['cclass']; ?></td>
                                <td>
                                    <a href="view_inventory.php?cid=<?php echo $row['cid']; ?>&inv_for=old"
                                        class="ui button">View Inventory</a>

                                </td>

                            </tr>

                            <?php
                        }
                    }
                    ?>

                </tbody>
                <?php if ($_SESSION['role'] == 1) { ?>
                    <tfoot class="full-width">
                        <tr>
                            <th colspan="5">
                                <a class="ui primary button" href="old-add.php"> Add Member </a>
                            </th>
                        </tr>
                    </tfoot>
                <?php }?>
            </table>



        </div>

    </div>

</div>

<?php include './admin_components/admin_footer.php' ?>