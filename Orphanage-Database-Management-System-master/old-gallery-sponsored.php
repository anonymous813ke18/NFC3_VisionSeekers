<?php include './components/header.php'; ?>

    <div class="ui container">

        <!-- Top Navigation Bar -->
        <?php include './components/top-menu.php'; ?>

        <!-- BODY Content -->
        <div class="ui grid">
            <!-- Left menu -->
            <?php include './components/side-menu.php'; ?>
            
            <!-- right content -->
            <div class="twelve wide column">
                
                <h1 style="text-align: center; background-color: #fff; border-radius: 10px">NGO's</h1>
                
                <div class="ui pointing menu">
                    <a class="item" href="old-gallery-sponsored.php">
                        Sponsored Old Age
                    </a>
                    <a class="item active" href="old-gallery-unsponsored.php">
                        Not Sponsored Old Age
                    </a>
                </div>


                <?php

                    $sql = "SELECT cid, cname, cyoe, cclass,cphoto FROM old WHERE sponsored=0";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            // $dob = $row["cdob"];
                            // $age = (date('Y') - date('Y',strtotime($dob)));
                ?>

                <div class="ui segment">
                    <div class="ui divided items">
                        <div class="item">
                            <div class="ui image">
                                <img src="./admin/<?php echo $row['cphoto']; ?>" style="width: 120px;">
                            </div>
                            <div class="middle aligned content">
                            <div class="meta">
                                <span><strong>Old Age Details:</strong></span>
                            </div>
                            <div class="description">
                                <div class="ui horizontal list">
                                    
                                    <!-- <div class="item">
                                        <div class="content">
                                            <div>Age:</div> <strong><?php echo $age; ?></strong>
                                        </div>
                                    </div> -->
                                    <div class="item">
                                        <div class="content">
                                            <div>Name:</div> <strong><?php echo $row["cname"]; ?></strong> 
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="content">
                                        <div>Class:</div> <strong><?php echo $row["cclass"]; ?></strong>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="item">
                                        <div class="content">
                                        <div>Since:</div> <strong><?php echo $row["cyoe"]; ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="extra">
                                <a class="ui right button" href="donation.php">Donate</a>
                                <!-- <a class="ui right button" href="sponsor-old.php?cid=<?php echo $row['cid']; ?>">Sponsor</a> -->
                                <a class="ui right button" href="send-gift-old.php?cid=<?php echo $row['cid']; ?>">Send a gift</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                        }
                    } else {
                        echo "0 results";
                    }

                ?>

            </div>
            <span class="p-20"></span>
        </div>

    </div>
    
<?php include './components/footer.php'; ?>