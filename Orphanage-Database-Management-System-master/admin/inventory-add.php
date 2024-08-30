<?php include './admin_components/admin_header.php'; ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './admin_components/admin_top-menu.php'; ?>

    <!-- BODY Content -->
    <div class="ui grid">
        <!-- Left menu -->
        <?php include './admin_components/admin_side-menu.php'; ?>
        
        <!-- Right content -->
        <div class="twelve wide column">
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Inventory Form</h1>

            <?php
                // Check if 'cid' is set in the URL
                if(isset($_GET['cid'])) {
                    $cid = $_GET['cid'];

                    if(isset($_POST['submit_inventory'])) {
                        // Collect form data
                        $inv_name = $_POST['inv_name'];
                        $inv_qnt = $_POST['inv_qnt'];
                        $inv_for = $_POST['inv_for'];

                        // Insert record into the database
                        $sql = "INSERT INTO inventory (cid, inv_name, inv_qnt, inv_for) VALUES ('$cid', '$inv_name', '$inv_qnt', '$inv_for')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('New record created successfully');</script>";
                        } else {
                            echo "<script>alert('Error in Insertion');</script>";
                        }

                        $conn->close();
                    }
                } else {
                    echo "<script>alert('No CID found in URL');</script>";
                }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] . '?cid=' . $cid; ?>" method="post" class="ui form">
                <div class="seven wide field">
                    <label>Item Name</label>
                    <input type="text" name="inv_name" placeholder="Inventory Name" required>
                </div>
                <div class="seven wide field">
                    <label>Quantity</label>
                    <input type="number" name="inv_qnt" required>
                </div>
                <input type="hidden" name="inv_for" value="old">
                <button name="submit_inventory" type="submit" class="ui primary button">Submit</button>
                <button type="reset" class="ui button">Reset</button>
            </form>
        </div>
    </div>
</div>

<?php include './admin_components/admin_footer.php'; ?>
