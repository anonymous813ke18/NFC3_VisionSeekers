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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">NGO Registration Form</h1>

            <?php
            if (isset($_POST['submit_child'])) {
                // Collect form data
                $child_name = $_POST['child_name'];
                $child_yoe = $_POST['child_yoe'];
                $child_tp = $_POST['typeOfNgo'];
                $child_class = $_POST['child_class'];
                $child_story_behind = $_POST['child_story_behind'];

                // Check if file is uploaded
                if (isset($_FILES['child_pic']) && $_FILES['child_pic']['error'] == UPLOAD_ERR_OK) {
                    $child_pic = $_FILES['child_pic']['name'];  // Get the original file name
                    $child_pic_tmp = $_FILES['child_pic']['tmp_name'];  // Get the temp file name
            
                    // Define the target directory and file name
                    $target_dir = "photo/";
                    $target_file = $target_dir . $child_name . "_" . $child_yoe . "_" . basename($child_pic);

                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($child_pic_tmp, $target_file)) {
                        // Insert record into the old table
                        $sql = "INSERT INTO old (cname, typeOfNgo,cyoe, cclass, cstory, cphoto) VALUES ('$child_name', '$child_tp', '$child_yoe', '$child_class', '$child_story_behind', '$target_file')";

                        if ($conn->query($sql) === TRUE) {
                            // Get the last inserted cid
                            $last_cid = $conn->insert_id;


                            // Insert into member table using last inserted cid as user_id
                            $sql2 = "INSERT INTO member (user_id, username, password, role) VALUES ('$last_cid', '$child_name', SHA('$child_name'), '0')";

                            if ($conn->query($sql2) === TRUE) {
                                echo "<script>alert('New record created successfully and user added to the member table');</script>";
                            } else {
                                echo "<script>alert('Error in inserting the user into the member table');</script>";
                            }
                        } else {
                            echo "<script>alert('Error in inserting the record into the old table');</script>";
                        }
                    } else {
                        echo "<script>alert('Error in uploading the image');</script>";
                    }

                } else {
                    // Handle the case where no file was uploaded or there was an error
                    echo "<script>alert('No image was uploaded or there was an upload error');</script>";
                }

                $conn->close();
            }
            ?>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="ui form"
                enctype="multipart/form-data">
                <div class="seven wide field">
                    <label>Old Age House Name</label>
                    <input type="text" name="child_name" placeholder="Old Age House Name" required>
                </div>
                <div class="seven wide field">
                    <label>Type Of NGO</label>
                    <select name="typeOfNgo" required>
                        <option value="OldAge">Old age</option>
                        <option value="Orphanage">Orphanage</option>
                    </select>
                </div>

                <div class="seven wide field">
                    <label>Year of Creation</label>
                    <input type="number" min="1900" max="2200" name="child_yoe" required>
                </div>
                <div class="seven wide field">
                    <label>Address</label>
                    <input type="text" name="child_class" required>
                </div>
                <div class="field">
                    <label>Description Of Old Age Homes</label>
                    <textarea name="child_story_behind" rows="2" required></textarea>
                </div>
                <div class="field">
                    <label>Upload Child Image</label>
                    <input type="file" name="child_pic" accept="image/*" required>
                </div>
                <button name="submit_child" type="submit" class="ui primary button">Submit</button>
                <button type="reset" class="ui button">Reset</button>
            </form>
        </div>
    </div>
</div>

<?php include './admin_components/admin_footer.php' ?>