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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Inventory Details</h1>

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Inventory Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // Get 'cid' and 'inv_for' from the URL
                        $cid = $_GET['cid'];
                        $inv_for = $_GET['inv_for'];

                        // Fetch inventory details based on 'cid' and 'inv_for'
                        $sql = "SELECT inv_id,inv_name, inv_qnt FROM inventory WHERE cid='$cid' AND inv_for='$inv_for'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                    ?>

                    <tr>
                        <td><?php echo $row['inv_name']; ?></td>
                        <td><?php echo $row['inv_qnt']; ?></td>
                        <td>
                            <!-- Add the Share Button -->
                            <a class="ui button" href="share_inv.php?cid=<?php echo $cid?>&inv_id=<?php echo $row['inv_id']; ?>&inv_for=old>">Share</a>
                        </td>
                    </tr>
                    
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='2'>No Inventory found for this CID</td></tr>";
                        }
                    ?>

                </tbody>
                <tfoot class="full-width">
                    <tr>
                        <th colspan="3">
                            <a class="ui primary button" href="inventory-add.php?cid=<?php echo $cid; ?>&type=oldinv"> Add Inventory </a>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php include './admin_components/admin_footer.php'; ?>
