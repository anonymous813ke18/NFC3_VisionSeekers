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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Donation Application</h1>

            <?php

              if(isset($_POST['submit_donation'])) {
                $program = $_POST['program'];
                $amount = $_POST['amount'];
                $checkno = $_POST['check'];
                $bank_name = $_POST['bank_name'];
                $place = $_POST['place'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];

                $sql = "INSERT INTO donation (program, amount, checkno, bank_name, place, d_name, email, phone, d_address) 
                        VALUES ('$program', '$amount', '$checkno', '$bank_name', '$place', '$name', '$email', '$phone', '$address')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script> alert('Successfully Donation form Submitted'); </script>";
                } else {
                    echo "<script> alert('Error in Insertion'); </script>";
                }
                
                $conn->close();
              }

            ?>

            <!-- Dropdown for Selecting Person -->
            <form id="donationForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="ui form">

                <div class="field">
                    <label>Select Person:</label>
                    <select id="personDropdown" class="ui dropdown">
                        <option value="">Select NGO</option>
                        <?php
                        $sql = "SELECT cid, cname FROM old";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row['cid'] . "'>" . $row['cname'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <h4 class="ui dividing header">Select the program to sponsor</h4>
                <div id="programsList" class="grouped fields">
                    <label for="program">Programs: </label>
                    <?php
                    $sql = "SELECT * FROM programs";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    
                    <div class="field programItem" data-cid="<?php echo $row['cid']; ?>">
                        <div class="ui radio checkbox">
                            <input type="radio" name="program" value="<?php echo $row['program_title']; ?>">
                            <label><?php echo $row['program_title']; ?></label>
                        </div>
                    </div>

                    <?php
                        }
                    }
                    ?>
                </div>

                <div class="field">
                  <label>Amount</label>
                  <input type="number" name="amount" min="1" placeholder="Amount" required>
                </div>

                <h4 class="ui dividing header">Check and Demand Draft</h4>
                <div class="field">
                  <label>Check / DD no.</label>
                  <input type="text" name="check" placeholder="Check / DD no." required>
                </div>
                <div class="field">
                  <label>Bank Name</label>
                  <input type="text" name="bank_name" placeholder="Bank Name" required>
                </div>
                <div class="field">
                  <label>Place</label>
                  <input type="text" name="place" placeholder="Place" required>
                </div>

                <h4 class="ui dividing header">Personal Information</h4>
                <div class="field">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="field">
                    <label>Phone no.</label>
                    <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                </div>
                <div class="field">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <button name="submit_donation" class="ui primary button" type="submit">Submit</button>
                <button class="ui button" type="reset">Reset</button>

            </form>

            <span class="p-20"></span>
        </div>
    </div>

</div>

<?php include './components/footer.php'; ?>

<!-- JavaScript to Filter Programs Based on Dropdown Selection -->
<script>
    document.getElementById('personDropdown').addEventListener('change', function () {
        var selectedCid = this.value;
        var programItems = document.querySelectorAll('.programItem');

        programItems.forEach(function (item) {
            if (selectedCid === "" || item.getAttribute('data-cid') === selectedCid) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
</script>
