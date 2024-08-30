<?php include './admin_components/admin_header.php'; ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './admin_components/admin_top-menu.php'; ?>

    <!-- BODY Content -->
    <div class="ui grid">
        <!-- Left menu -->
        <?php include './admin_components/admin_side-menu.php'; ?>

        <!-- right content -->
        <div class="twelve wide column">
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Person Registration Form</h1>

            <?php
            // Fetch data from `old` table
            if ($_SESSION['role'] == 1) {
                // If role is 1, select all records
                $sql = "SELECT cid, cname FROM old";
            } else {
                // If role is not 1, select records based on the user_id from the session
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT cid, cname FROM old WHERE cid = '$user_id'";
            }
            $result = $conn->query($sql);

            if (isset($_POST['submit_child'])) {
                $child_name = $_POST['child_name'];
                $child_dob = $_POST['child_dob'];
                $child_yoe = $_POST['child_yoe'];
                $child_story_behind = $_POST['child_story_behind'];
                $old_cid = $_POST['old_cid'];  // Selected old.cid

                // Handle file upload
                $target_dir = "photo/";
                $timestamp = time();  // Current timestamp
                $target_file = $target_dir . $timestamp . '-' . basename($_FILES["child_pic"]["name"]);
                $upload_ok = 1;
                $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["child_pic"]["tmp_name"]);
                if ($check === false) {
                    echo "<script>alert('File is not an image.');</script>";
                    $upload_ok = 0;
                }

                // Check file size (5MB limit)
                if ($_FILES["child_pic"]["size"] > 5000000) {
                    echo "<script>alert('File is too large.');</script>";
                    $upload_ok = 0;
                }

                // Allow certain file formats
                if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
                    echo "<script>alert('Only JPG, JPEG, PNG & GIF files are allowed.');</script>";
                    $upload_ok = 0;
                }

                // Check if $upload_ok is set to 0 by an error
                if ($upload_ok == 0) {
                    echo "<script>alert('Your file was not uploaded.');</script>";
                } else {
                    // Try to upload file
                    if (move_uploaded_file($_FILES["child_pic"]["tmp_name"], $target_file)) {
                        // Insert into the database
                        $sql = "INSERT INTO children (cname, cdob, cyoe, cstory, cphoto, belongCid) VALUES ('$child_name', '$child_dob', '$child_yoe', '$child_story_behind', '$target_file', '$old_cid')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('New record created successfully');</script>";
                        } else {
                            echo "<script>alert('Error in Insertion');</script>";
                        }
                    } else {
                        echo "<script>alert('Error in uploading the image');</script>";
                    }
                }
                $conn->close();
            }
            ?>

            <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data" class="ui form">
                <div class="seven wide field">
                    <label>Child Name</label>
                    <input type="text" name="child_name" placeholder="Child's Name" required>
                </div>
                <div class="seven wide field">
                    <label>Date of Birth</label>
                    <input type="date" name="child_dob" required>
                </div>
                <div class="seven wide field">
                    <label>Year of Enroll</label>
                    <input type="number" min="1900" max="2200" name="child_yoe" required>
                </div>
                <div class="field">
                    <label>Story Behind</label>
                    <textarea name="child_story_behind" rows="2" required></textarea>
                </div>
                <div class="field">
                    <label>Upload Child Image</label>
                    <input type="file" name="child_pic" accept="image/*" required>
                </div>
                <div class="seven wide field">
                    <label>Select NGO</label>
                    <select name="old_cid" required>
                        <option value="">Select NGO</option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['cid'] . "'>" . $row['cname'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <button name="submit_child" type="submit" class="ui primary button">Submit</button>
                <button type="reset" class="ui button">Reset</button>
            </form>
        </div>
    </div>
</div>

<?php include './admin_components/admin_footer.php'; ?>
