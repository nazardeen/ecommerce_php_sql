<?php
include '../Includes/header.php';

require_once  '../Library/Classes/dailyreportclass.php';



$Reports = new Report();

$date = date("Y-m-d");
// Grand Total 
$GrandTotal = $Reports->getTotal();

// get All Profits 
$profit = $Reports->getProfitAll();
$dif = 0;
if ($profit) {
    foreach ($profit as $row) {
        $dif += ($row['retail_price'] - $row['buying_price']) * $row['quantity'];
    }
}

$ItemCount = $Reports->getTotalItems();
$years = $Reports->getYear();

// last 5 orders 
$lastOrders = $Reports->getLastOrders();
$totalOrders = $Reports->getTotalOrders();
$InventoryVal = $Reports->getInventoryValue();
$TotalSumDate = $Reports->getTotalCountDate($date);
$TotalReturns = $Reports->getReturnValue();

?>


<style>
    .card {
        border-radius: 1.25rem;
        background: #343a40;
        border: 1px solid #505355;
    }

    .allRows {
        padding: 0 1rem;
    }

    .card .cardName {
        color: #fff;
    }

    .card .iconBox {
        font-size: 2.5em;
        color: #fff;
    }

    .analytics-card {
        background: #343a40;
        padding: 1.5rem;
    }
</style>

<div class="allRows">
    <!-- first row -->
    <div class="row mb-3">

        <!-- first card -->
        <div class="col-md-3">
            <div class="card1 mb-3">
                <div>
                    <div class="numbers">Rs.<?= $GrandTotal['grandTotal'] ?></div>
                    <div class="cardName">TOTAL RECEIVABLE</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- second card -->
        <div class="col-md-3">
            <div class="card2 mb-3">
                <div>
                    <div class="numbers">Rs.<?= $dif ?></div>
                    <div class="cardName">TOTAL PROFIT</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- third card -->
        <div class="col-md-3">
            <div class="card3 mb-3">
                <div>
                    <div class="numbers"><?= $ItemCount['qty'] ?></div>
                    <div class="cardName">TOTAL PRODUCTS</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- fourth card -->
        <div class="col-md-3">
            <div class="card4 mb-3">
                <div>
                    <div class="numbers">Rs.<?= $InventoryVal['cost'] ?></div>
                    <div class="cardName">INVENTORY VALUE</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-signal" aria-hidden="true"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- second row -->
    <div class="row mb-3">

        <!-- first card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">TOTAL INVOICE</div>
                    <div class="numbers"><?= $totalOrders['orderCount'] ?></div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- second card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">RETURNS</div>
                    <div class="numbers">Rs.<?= $TotalReturns['returnVal'] ?></div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-signal" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- third card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">DAILY TOTAL</div>
                    <div class="numbers">RS. <?php
                                                if ($TotalSumDate['grandTotal'] > "0") {

                                                    $TotalSumDate['grandTotal'];
                                                } else {

                                                    echo "0";
                                                }

                                                ?></div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- fourth card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">TOTAL SOLD PRO.QTY</div>
                    <div class="numbers">10</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
            </div>
        </div>

    </div>

    <!-- third row -->
    <div class="row mb-3">

        <!-- first card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">TOTAL CUSTOMERS</div>
                    <div class="numbers">Rs.25000</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- second card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">TOTAL SUPPLIERS</div>
                    <div class="numbers">10</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- third card -->
        <div class="col-md-3">
            <div class="card mb-3">
                <div>
                    <div class="cardName">TOTAL ITEMS IN STOKE</div>
                    <div class="numbers">10</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-signal" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <!-- fourth card -->
        <div class="col-md-3">
            <div class="card ">
                <div>
                    <div class="cardName">TOTAL ITEM CATEGORY</div>
                    <div class="numbers">10</div>
                </div>
                <div class="iconBox">
                    <i class="fa fa-list" aria-hidden="true"></i>
                </div>
            </div>
        </div>

    </div>
</div>



<div class="chart">
    <div class="analytics-card">
        <h4 class="text-center">Last 3 Years Total Recievebles</h4>
        <div id="chart_div">
        </div>
    </div>

    <div class="invoice">
        <div class="recentinvoice">
            <div class="">
                <h5>Recent Invoices</h5>

            </div>
            <table>
                <thead>
                    <tr>
                        <td>Order ID</td>
                        <td>Customer Name</td>
                        <td>Amount</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($lastOrders as $row) {
                    ?>
                        <tr>
                            <td><?= $row['order_id'] ?></td>
                            <td><?= $row['full_name'] ?></td>
                            <td>Rs.<?= $row['total'] ?></td>
                            <td>
                                <?php
                                if ($row['status'] == 'complete') {
                                ?>
                                    <span class="badge rounded-pill bg-success">Complete</span>
                                <?php
                                } else if ($row['status'] == 'pending') {
                                ?>
                                    <span class="badge rounded-pill bg-info">Pending</span>
                                <?php
                                }

                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

</div>
</body>

</html>

<?php include '../Includes/footer.php' ?>

<script>
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
            ['Quantity', 'Grand Total'],
            <?php
            foreach ($years as $row) {
                echo "['" . $row["year"] . "' , " . $row["total"] . "],";
            }

            ?>

        ]);

        // Set chart options
        var options = {
            titleTextStyle: {
                'color': '#ffffff',
                fontSize: 18,
            },
            legend: {
                textStyle: {
                    color: '#ffffff',
                    fontSize: 14,
                }
            },
            'width': 00,
            'height': 300,
            'backgroundColor': 'transparent',
            'color': '#fff',
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>