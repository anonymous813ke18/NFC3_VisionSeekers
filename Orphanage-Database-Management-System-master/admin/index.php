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
            <h1 style="text-align: center; background-color: #fff; border-radius: 10px">Welcome to Administrator</h1>
        </div>


        <style>
            .chart-container {
                margin-top: 20px;
                flex: 1 1 calc(50% - 10px);
                border: 3px solid black;
                border-radius: 2%;
                padding: 2%;
            }

            .chartImg {
                width: 100%;
                height: auto;
            }
        </style>


        <div class="container" style="display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Adjust as needed */
    padding: 10px;">
            <!-- Sponsor Amounts Chart -->

            <div class="chart-container" id="sponsorChartContainer"></div>

            <!-- Age Groups Pie Chart -->

            <div class="chart-container" id="ageGroupChartContainer"></div>

            <!-- Donors Per Month Line Chart -->

            <div class="chart-container" id="donorChartContainer"></div>


            <!-- Top Five Donations Bar Chart -->
            <div class="chart-container" id="topDonationsChartContainer"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function () {
                // Sponsor Amounts Chart
                $.ajax({
                    url: 'get_sponsor_data.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var chartUrl = `https://quickchart.io/chart?c=${encodeURIComponent(JSON.stringify({
                            type: 'bar',
                            data: {
                                labels: data.sponsors,
                                datasets: [{

                                    label: 'Total Amount',
                                    data: data.amounts,
                                    backgroundColor: 'blue',
                                    color: 'white' 
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        }))}`;
                        $('#sponsorChartContainer').html(`<h4>Sponsor Report</h4><br><img class="chartImg" src="${chartUrl}" alt="Sponsor Amounts Chart">`);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching sponsor data:', error);
                    }
                });

                // Age Groups Pie Chart
                $.ajax({
                    url: 'get_age_group_data.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var chartUrl = `https://quickchart.io/chart?c=${encodeURIComponent(JSON.stringify({
                            type: 'pie',
                            data: {
                                labels: data.age_groups,
                                datasets: [{
                                    data: data.counts,
                                    backgroundColor: ['lightgreen', 'orange', 'yellow', 'yellow', 'purple']
                                }]
                            },
                            options: {
                                plugins: {
                                    legend: {
                                        position: 'top',
                                        labels: {
                                            font: {
                                                size: 10,    // Font size
                                                weight: 'bold'  // Font style
                                            },
                                            color: 'white' // Font color
                                        }
                                    }
                                }
                            }
                        }))}`;
                        $('#ageGroupChartContainer').html(`<h4>Age Group Report</h4><br><img class="chartImg" src="${chartUrl}" alt="Age Groups Pie Chart">`);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching age group data:', error);
                    }
                });

                // Donors Per Month Line Chart
                $.ajax({
                    url: 'get_donors_per_month.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var chartUrl = `https://quickchart.io/chart?c=${encodeURIComponent(JSON.stringify({
                            type: 'line',
                            data: {
                                labels: data.months,
                                datasets: [{
                                    label: 'Number of Donors',
                                    data: data.donor_counts,
                                    borderColor: 'green',
                                    fill: false
                                }]
                            }
                        }))}`;
                        $('#donorChartContainer').html(` <h4>Donor Report</h4><br><img class="chartImg" src="${chartUrl}" alt="Donors Per Month Line Chart">`);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching donor data:', error);
                    }
                });

                // Top Five Donations Bar Chart
                $.ajax({
                    url: 'get_top_five_donations.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var chartUrl = `https://quickchart.io/chart?c=${encodeURIComponent(JSON.stringify({
                            type: 'bar',
                            data: {
                                labels: data.programs,
                                datasets: [{
                                    label: 'Total Amount',
                                    data: data.amounts,
                                    backgroundColor: 'brown'
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        }))}`;
                        $('#topDonationsChartContainer').html(`<h4>Donations Report</h4><br><img class="chartImg" src="${chartUrl}" alt="Top Five Donations Bar Chart">`);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error fetching top donations data:', error);
                    }
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    </div>

</div>

<?php include './admin_components/admin_footer.php' ?>