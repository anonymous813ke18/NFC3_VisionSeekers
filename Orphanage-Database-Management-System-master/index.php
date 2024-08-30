<?php include './components/header.php'; ?>

<div class="ui container">

    <!-- Top Navigation Bar -->
    <?php include './components/top-menu.php'; ?>

    <style>
        .ui.grid {
            display: flex; /* Enables Flexbox for alignment */
            justify-content: center; /* Centers the `.twelve.wide.column` horizontally */
            align-items: center; /* Centers the content vertically */
            padding: 0 20px; /* Adds padding for responsive spacing */
            max-width: 1000px; /* Controls the maximum width of the grid */
            margin: 0 auto; /* Centers the `.ui.grid` on the page */
            height: 100vh; /* Ensures the grid takes up the full height of the viewport */
            background: rgba(255, 255, 255, 0.1); /* Translucent background */
        }
        .twelve.wide.column {
            display: flex;
            flex-direction: column; /* Allows vertical stacking of child elements */
            align-items: center; /* Centers the content inside the column */
            width: 100%; /* Ensures the column takes full width of the available space */
            max-width: 800px; /* Optionally set a max-width to control the width of content */
        }

        .ui.medium.center.images {
            display: flex;
            flex-direction: row;
        }
    </style>
    <!-- BODY Content -->
    <div class="ui grid"> <!-- The .ui.grid is centered using the updated CSS -->
        <!-- Left menu -->
        <?php include './components/side-menu.php'; ?>
        
        <!-- Right content -->
        <div class="twelve wide column">
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">HOME</h1>
            <h3>Child Care & Development Foundation</h3>
            <p><strong>CCDF</strong> is a non-profit, non-government, and voluntary organization committed to the care & development and voluntary organization committed to the care and development of the underprivileged children.</p>
            <p><strong>CCDF is a group</strong> of qualified, hardworking, dedicated, like-minded people trying to make a difference in the life of the underrepresented, disadvantaged, and marginalized sections of the society. It has been established to work as a platform to channelize and make optimum use of the resources and infrastructure available and people's desire to give back to society a bit of what they owe to it.</p>
            <p><strong>It is our effort</strong> at CCDF to guide and motivate people to use their resources in a construction in changing the lives of these street children.</p>
            <p><strong>We are working</strong> in the field of education and overall development of destitute children by providing them with an opportunity to realize their full potentials and lead a dignified and respectable life.</p>

            <div class="ui medium center images" style="text-align: center;">
                <img style="width: 400px; height: 280px;" class="ui medium rounded image" src="./img/children-1.jpg">
                <img style="width: 400px; height: 280px;" class="ui medium rounded image" src="./img/children-2.jpg">
            </div>

            <span class="p-20"></span>
        </div>
    </div>

</div>

<?php include './components/footer.php'; ?>
