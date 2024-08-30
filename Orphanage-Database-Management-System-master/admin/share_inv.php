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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Share Inventory</h1>

            <?php
                // Initialize variables
                $inv_name = '';
                $max_qnt = 0;

                // Check if 'cid' and 'inv_id' are set in the URL
                if(isset($_GET['cid']) && isset($_GET['inv_id'])) {
                    $cid = $_GET['cid'];
                    $inv_id = $_GET['inv_id'];

                    // Get the current inventory details
                    $sql = "SELECT inv_name, inv_qnt FROM inventory WHERE inv_id = '$inv_id'";
                    $result = $conn->query($sql);

                    if ($result && $result->num_rows > 0) {
                        $inventory = $result->fetch_assoc();
                        $inv_name = $inventory['inv_name'];
                        $max_qnt = $inventory['inv_qnt'];
                    } else {
                        echo "<script>alert('No inventory found with this ID');</script>";
                    }

                    if(isset($_POST['submit_share'])) {
                        // Collect form data
                        $share_to_cid = $_POST['share_to_cid'];
                        $share_qnt = $_POST['share_qnt'];

                        if($share_qnt > 0 && $share_qnt <= $max_qnt) {
                            // Insert new record into the inventory for the selected old age house
                            $sql = "INSERT INTO inventory (cid, inv_name, inv_qnt, inv_for) VALUES ('$share_to_cid', '$inv_name', '$share_qnt', 'old')";

                            if ($conn->query($sql) === TRUE) {
                                // Update the original inventory to decrease the quantity
                                $new_qnt = $max_qnt - $share_qnt;
                                $update_sql = "UPDATE inventory SET inv_qnt = '$new_qnt' WHERE inv_id = '$inv_id'";

                                if ($conn->query($update_sql) === TRUE) {
                                    echo "<script>alert('Inventory shared successfully');</script>";
                                } else {
                                    echo "<script>alert('Error in updating original inventory');</script>";
                                }
                            } else {
                                echo "<script>alert('Error in sharing inventory');</script>";
                            }
                        } else {
                            echo "<script>alert('Invalid quantity selected');</script>";
                        }
                    }
                } else {
                    echo "<script>alert('No CID or Inventory ID found in URL');</script>";
                }

                // Get the list of old age houses for the dropdown
                $sql = "SELECT cid, cname FROM old";
                $old_list = $conn->query($sql);
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] . '?cid=' . $cid . '&inv_id=' . $inv_id; ?>" method="post" class="ui form">
                <div class="seven wide field">
                    <label>Share To</label>
                    <select name="share_to_cid" required>
                        <?php
                            if ($old_list && $old_list->num_rows > 0) {
                                while($row = $old_list->fetch_assoc()) {
                                    echo "<option value='{$row['cid']}'>{$row['cname']}</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="seven wide field">
                    <label>Quantity (Max: <?php echo $max_qnt; ?>)</label>
                    <input type="number" name="share_qnt" min="1" max="<?php echo $max_qnt; ?>" required>
                </div>
                <button name="submit_share" type="submit" class="ui primary button">Share</button>
                <button type="reset" class="ui button">Reset</button>
            </form>
        </div>
    </div>
</div>

<?php include './admin_components/admin_footer.php'; ?>
