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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Create New Program Details</h1>

            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_POST['submit_program'])) {
                $title = $_POST['title'];
                $desc = $_POST['desc'];

                // Determine the CID based on user role
                if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    $cid = $_POST['cid'];
                } else {
                    $cid = $_SESSION['user_id'];
                }

                // Insert record into the database
                $sql = "INSERT INTO programs (program_title, program_desc, cid) VALUES ('$title', '$desc', '$cid')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('New Program created successfully');</script>";
                } else {
                    echo "<script>alert('Error in Insertion');</script>";
                }
                $conn->close();
            }

            // Handle program deletion
            if (isset($_GET['delete_program'])) {
                $program_id = $_GET['delete_program'];

                // Delete record from the database
                $sql = "DELETE FROM programs WHERE program_id = $program_id";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Program deleted successfully');</script>";
                } else {
                    echo "<script>alert('Error in Deletion');</script>";
                }
            }

            ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="ui form">
                <div class="field">
                    <label>Title</label>
                    <div class="eight wide field">
                        <input type="text" name="title" placeholder="Program Title" required>
                    </div>
                </div>

                <div class="field">
                    <label>Description</label>
                    <textarea name="desc" rows="2" placeholder="Program Description" required></textarea>
                </div>

                <?php
                // Check the session role
                if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    // Role is 1, fetch all records from `old`
                    $sql = "SELECT * FROM old";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<div class="field">';
                        echo '<label>Select NGO</label>';
                        echo '<select name="cid" required>';
                        echo '<option value="">Select NGO</option>';
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['cid'] . "'>" . $row['cname'] . "</option>";
                        }
                        echo '</select>';
                        echo '</div>';
                    }
                } else {
                    // Role is not 1, do not show the dropdown
                    echo '<input type="hidden" name="cid" value="' . $_SESSION['user_id'] . '">';
                }
                ?>

                <button name="submit_program" type="submit" class="ui primary button">Submit</button>
                <button type="reset" class="ui button">Reset</button>
            </form>

            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>Program ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check the user role and determine the SQL query
                    if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                        // Role is 1, fetch all records from `programs`
                        $sql = "SELECT * FROM programs";
                    } else {
                        // Role is not 1, fetch records where cid matches session user_id
                        $user_id = $_SESSION['user_id'];
                        $sql = "SELECT * FROM programs WHERE cid = $user_id";
                    }

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['program_id'] . "</td>";
                            echo "<td>" . $row['program_title'] . "</td>";
                            echo "<td>" . $row['program_desc'] . "</td>";
                            echo "<td><a href='#' onclick='return confirmDelete(" . $row['program_id'] . ")' class='ui red button'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No programs found</td></tr>";
                    }
                    ?>
                </tbody>

            </table>
        </div>
        <span class="p-20"></span>
    </div>
    <script>
        function confirmDelete(programId) {
            // Show confirmation dialog
            var confirmDelete = confirm("Are you sure you want to delete this program?");
            if (confirmDelete) {
                // Redirect to delete the program
                window.location.href = "?delete_program=" + programId;
            }
            return false; // Prevent default link behavior
        }
    </script>
</div>

<?php include './admin_components/admin_footer.php'; ?>