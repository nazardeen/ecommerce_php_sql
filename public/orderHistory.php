<?php
session_start();
// var_dump($_SESSION);
if ($_SESSION) {
} else {
    //  header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    header('location: index.php');
    exit();
}

session_write_close();

include 'includes/header.php';
include 'includes/customerSideNav.php';



?>

<section style="min-height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="table-responsive-md">
                <table class="table table-secondary">
                    <thead>
                        <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Qunatity</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $OrderHistory = $product->getOrdersbyCusID("8");

                        if ($OrderHistory) {
                            foreach ($OrderHistory as $row) {


                        ?>
                                <tr>
                                    <th scope="col"><?= $row['order_id']?></th>
                                    <th scope="col"><?= $row['order_date']?></th>
                                    <th scope="col"><?= $row['qty']?></th>
                                    <th scope="col"><?= $row['total']?></th>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>

</div>
</div>

<?php
include 'includes/footer.php';

?>