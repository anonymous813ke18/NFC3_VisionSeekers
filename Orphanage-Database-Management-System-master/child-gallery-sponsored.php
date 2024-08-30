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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">People</h1>
<br>
            <div class="ui pointing menu">
                <a class="item active" href="child-gallery-sponsored.php">Sponsored Person</a>
                <a class="item" href="child-gallery-unsponsored.php">Not Sponsored Person</a>
            </div>

            <div class="table-wrapper">
                <div class="table-title" style="display: flex; justify-content: center">
                    <h4 class="travel_title" style="text-align: center">Sponsored People Details</h4>
                </div>
                <table id="sponsoredTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>CID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Class</th>
                            <th>Year of Enrollment</th>
                            <th>Photo</th>
                            <th>Sponsor's Name</th>
                            <th>Sponsor's Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT cid, cname, cdob, cyoe, cclass, cphoto FROM children WHERE sponsored=1";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $dob = $row["cdob"];
                                $age = (date('Y') - date('Y', strtotime($dob)));

                                echo "<tr>";
                                echo "<td>" . $row['cid'] . "</td>";
                                echo "<td>" . $row['cname'] . "</td>";
                                echo "<td>" . $age . "</td>";
                                echo "<td>" . $row['cclass'] . "</td>";
                                echo "<td>" . $row['cyoe'] . "</td>";
                                echo "<td><img src='./admin/" . $row['cphoto'] . "' style='width: 120px;' alt='N/A'></td>";

                                $cid = $row['cid'];
                                $sql1 = "SELECT spn_firstname, spn_lastname, spn_email FROM sponsorer WHERE cid='$cid'";
                                $result1 = $conn->query($sql1);

                                if ($result1->num_rows > 0) {
                                    $sponsor = $result1->fetch_assoc();
                                    echo "<td>" . $sponsor['spn_firstname'] . " " . $sponsor['spn_lastname'] . "</td>";
                                    echo "<td>" . $sponsor['spn_email'] . "</td>";
                                } else {
                                    echo "<td colspan='2'>No sponsor details available</td>";
                                }

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No sponsored people found</td></tr>";
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
        $('#sponsoredTable').DataTable({
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
