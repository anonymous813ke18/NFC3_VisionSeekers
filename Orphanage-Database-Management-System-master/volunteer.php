<?php include './components/header.php'; ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './components/top-menu.php'; ?>


    <!-- BODY Content -->
    <div class="ui grid">
        <!-- Left menu -->
        <?php include './components/side-menu.php'; ?>

        
        <!-- Right content -->
        <div class="twelve wide column">
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Volunteer Form</h1>

            <?php
                // Check if 'program_id' is set in the URL
                if(isset($_GET['program_id'])) {
                    $program_id = $_GET['program_id'];

                    // Fetch the program name using the program_id
                    $fetch_program_sql = "SELECT program_title FROM programs WHERE program_id = '$program_id'";
                    $program_result = $conn->query($fetch_program_sql);

                    if ($program_result && $program_result->num_rows > 0) {
                        $program_row = $program_result->fetch_assoc();
                        $program_name = $program_row['program_title'];
                    } else {
                        $program_name = "Unknown Program";
                    }
                    
                    if(isset($_POST['submit_volunteer'])) {
                        // Collect form data
                        $vol_name = $_POST['vol_name'];
                        $vol_email = $_POST['vol_email'];
                        $vol_phone = $_POST['vol_phone'];

                        // Insert volunteer data into the database
                        $insert_volunteer_sql = "INSERT INTO volunteer (program_id, vol_name, vol_email, vol_phone) VALUES ('$program_id', '$vol_name', '$vol_email', '$vol_phone')";

                        if ($conn->query($insert_volunteer_sql) === TRUE) {
                            // Update the volunteer count in the programs table
                            $update_program_sql = "UPDATE programs SET vol_count = vol_count + 1 WHERE program_id = '$program_id'";

                            if ($conn->query($update_program_sql) === TRUE) {
                                echo "<script>alert('Volunteer registered successfully and count updated');</script>";
                            } else {
                                echo "<script>alert('Volunteer registered, but error updating count');</script>";
                            }
                        } else {
                            echo "<script>alert('Error in Volunteer Registration');</script>";
                        }
                    }

                    echo "<br><h3>Program: ".$program_name."</h3><br>";
                    // Fetch and display volunteers for the respective program
                    $volunteer_query = "SELECT * FROM volunteer WHERE program_id = '$program_id'";
                    $volunteer_result = $conn->query($volunteer_query);
                } else {
                    echo "<script>alert('No Program ID found in URL');</script>";
                }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF'] . '?program_id=' . $program_id; ?>" method="post" class="ui form">
                <div class="seven wide field">
                    <label>Name</label>
                    <input type="text" name="vol_name" placeholder="Your Name" required>
                </div>
                <div class="seven wide field">
                    <label>Email</label>
                    <input type="email" name="vol_email" placeholder="Your Email" required>
                </div>
                <div class="seven wide field">
                    <label>Phone</label>
                    <input type="text" name="vol_phone" placeholder="Your Phone Number" required>
                </div>
                <button name="submit_volunteer" type="submit" class="ui primary button">Submit</button>
                <button type="reset" class="ui button">Reset</button>
            </form>

            <!-- Volunteer List Table -->
             <br>
            <h2>Volunteers for this Program</h2>
            <table class="ui celled table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($volunteer_result->num_rows > 0) {
                            $counter = 1;
                            while($volunteer_row = $volunteer_result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $counter++ . "</td>";
                                echo "<td>" . $volunteer_row['vol_name'] . "</td>";
                                echo "<td>" . $volunteer_row['vol_email'] . "</td>";
                                echo "<td>" . $volunteer_row['vol_phone'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' style='text-align: center;'>No volunteers yet for this program.</td></tr>";
                        }

                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include './components/footer.php'; ?>
