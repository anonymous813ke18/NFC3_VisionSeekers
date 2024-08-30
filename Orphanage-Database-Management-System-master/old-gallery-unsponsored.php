<?php include './components/header.php'; ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './components/top-menu.php'; ?>

    <!-- BODY Content -->
    <div class="ui grid">
        <!-- Left menu -->
        <?php include './components/side-menu.php'; ?>

        <!-- Right content -->
        <div>

        <br>
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">NGO's</h1>
<br>
            <!-- <div class="ui pointing menu">
                <a class="item active" href="old-gallery-unsponsored.php">Details</a>
            </div> -->

            <div class="table-wrapper">
                <div class="table-title" style="display: flex; justify-content: center">
                    <!-- <h4 class="travel_title" style="text-align: center">NGO Details</h4> -->
                </div>
                <table id="ngoTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>CID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Year of Enrollment</th>
                            <th>Photo</th>
                            <th>Donate</th>
                            <th>Send Gift</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT cid, cname, cyoe, cclass, cphoto FROM old WHERE sponsored=0";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['cid'] . "</td>";
                                echo "<td>" . $row['cname'] . "</td>";
                                echo "<td>" . $row['cclass'] . "</td>";
                                echo "<td>" . $row['cyoe'] . "</td>";
                                echo "<td><img src='./admin/" . $row['cphoto'] . "' style='width: 120px;' alt='N/A'></td>";
                                echo "<td><a class='ui right button' href='donation.php'>Donate</a></td>";
                                echo "<td><a class='ui right button' href='send-gift-old.php?cid=" . $row['cid'] . "'>Send a gift</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <span class="p-20"></span>
    </div>

</div>

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#ngoTable').DataTable({
            "pagingType": "simple_numbers",
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50],
            "searching": true,
            "ordering": true,
            "info": true
        });
    });
</script>

<?php include './components/footer.php'; ?>
