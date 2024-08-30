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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Programs</h1>

            <br>
            <style>
                .title{
                    color: color: rgba(0, 0, 0, .7) !important;
                }
                </style>
            <!-- Search Bar -->
            <div class="ui fluid icon input">
                <input type="text" id="searchInput" placeholder="Search for a program...">
                <i class="search icon"></i>
            </div>
            <br>

            <!-- Accordion -->
            <div class="ui styled fluid accordion" id="programAccordion">
                <?php
                    $sql = "SELECT * FROM programs";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                ?>
                <div class="title programItem" data-program-title="<?php echo strtolower($row['program_title']); ?>" style="color: rgba(0, 0, 0, .7);">
                    <i class="dropdown icon"></i>
                    <?php echo $row['program_title']; ?>
                </div>
                <div class="content">
                    <p><?php echo $row['program_desc']; ?></p>
                    <a href="volunteer.php?program_id=<?php echo $row['program_id']; ?>" class="ui primary button">Volunteer</a>
                </div>
                <?php
                        }
                    }
                ?>
            </div>

            <span class="p-20"></span>
        </div>
    </div>

</div>

<?php include './components/footer.php'; ?>

<!-- Ensure jQuery and Semantic UI JS are included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>

<!-- JavaScript to Handle Accordion and Search Filtering -->
<script>
    $(document).ready(function() {
        // Initialize accordion
        $('.ui.accordion').accordion();

        // Search bar filtering
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();

            if (value === "") {
                // Close all accordion items when search input is empty
                $('#programAccordion .title').each(function() {
                    $(this).removeClass('active');
                    $(this).next('.content').hide();
                });
            } else {
                // Show/hide accordion items based on search input
                $('#programAccordion .title').each(function() {
                    var programTitle = $(this).text().toLowerCase();
                    var $content = $(this).next('.content');

                    if (programTitle.includes(value)) {
                        $(this).show();
                        $content.show();
                    } else {
                        $(this).hide();
                        $content.hide();
                    }
                });

                // Reset all open items
                $('.ui.accordion').accordion('refresh');
            }
        });

        // Handle accordion item clicks
        $('#programAccordion .title').on('click', function() {
            var $content = $(this).next('.content');
            
            // Toggle accordion content visibility
            if ($content.is(':visible')) {
                $(this).removeClass('active');
                $content.hide();
            } else {
                $(this).addClass('active');
                $content.show();
            }
        });
    });
</script>

