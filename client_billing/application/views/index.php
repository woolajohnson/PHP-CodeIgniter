<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="My Website made from Bootstrap" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Client Billing</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script>
            window.onload = function () {

            var options = {
                animationEnabled: true,
                title: {
                    text: "Client Billing - 2011"
                },
                axisY: {
                    title: "Estimate Cost",
                    suffix: ""
                },
                axisX: {
                    title: "Months"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.0#"%"",
                    dataPoints: [
<?php
                /* - Iterate each month from January to December together with the corresponding total cost
                    - $result value received from the controller which came from the model fetching from database */
                    foreach($result as $row) {
?> 
                        { label: "<?= $row['month']; ?>", y: <?= $row['total_cost']; ?> },
<?php
                    }
?>
                    ]
                }]
            };

            $("#chartContainer").CanvasJSChart(options);

            }
        </script>
    </head>
    <body>
        <div class="container">
            <section id="form" class="row mb-5">
                <div class="col-lg-8 offset-lg-2 mt-5 mb-3">
                    <h3 class="text-center">List of total charges per month:</h3>
                </div>
                <div class="col-lg-8 offset-lg-2">
                    <table class="table table-striped table-bordered mt-2 mb-5">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="col-4">Month</th>
                                <th scope="col" class="col-3">Year</th>
                                <th scope="col" class="col-1">Total Cost</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
                /* - Iterate each month from January to December together with the year and the corresponding total cost
                    - $result value received from the controller which came from the model fetching from database */
                        foreach($result as $row) {                 
?>
                            <tr>
                                <td scope="col" class="col-6"><?= $row['month']; ?></td>
                                <td scope="col" class="col-3"><?= $row['year']; ?></td>
                                <td scope="col" class="col-3"><?= $row['total_cost']; ?></td>
                            </tr>
<?php
                        }
?>
                        </tbody>
                    </table>
                </div>
            </section>
            <div class="col-lg-8 offset-lg-2 mt-5">
                <div id="chartContainer"></div>
            </div>
            
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"
        ></script>
        <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
    </body>
</html>