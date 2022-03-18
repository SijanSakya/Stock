<?php
include './php/config/autoload.php';

$comp = $user->read_company();
$mystock = $user->read_mystock();

?>



<?php include './layout/header.php'; ?>
<?php include './layout/sidebar.php'; ?>
<!-- HEADER ENDS -->


<div id="content" class="app-content">
    <div class="row">
        <div class="col-xl-6">

            Chart

        </div>
        <div class="col-xl-6">
            <div class=" fs-12px text-muted mb-3"><b>MY STOCK</b></div>
            <!-- table-striped -->

            <table class="table table-striped">
                <tr>
                    <th>S.N</th>
                    <th>Scrip</th>
                    <th>Quantity</th>
                    <th> Avg price</th>
                    <th>stocktype</th>
                </tr>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($mystock)) {
                ?>
                    <tr>
                        <?php
                        for ($i; $i <= $row; $i++) {   ?>
                            <td><span><?= $i++   ?></span></td>

                        <?php
                            break;
                        }
                        ?>

                        <td><span><?= $row['scrip_sym']  ?></span></td>
                        <td><span><?= $row['quantity']  ?></span></td>
                        <td><span><?= $row['price']  ?></span></td>
                        <td><span><?= $row['name']  ?></span></td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>

    </div>


    <div class="row">
        <div class=" fs-12px text-muted mb-3"><b>NEPSE</b></div>
        <!-- table-striped -->
        <div class="scrollit">
            <table class="table table-striped">
                <tr style="overflow:scroll; height:100px">
                    <th>SN</th>
                    <th>Symbol</th>
                    <th>Security name</th>
                    <th>Open price</th>
                    <th>high price</th>
                    <th>low price</th>
                    <th>Close price</th>
                    <th>Previous day close price</th>
                    <th>Total traded quantity</th>
                    <th>Total traded value</th>
                    <th>Market Capitalization</th>

                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($comp)) {
                    ?>
                <tr>
                    <?php
                        for ($i; $i <= $row; $i++) {   ?>
                        <td><span><?= $i++   ?></span></td>

                    <?php
                            break;
                        }
                    ?>


                    <td><span><?= $row['symbol']  ?></span></td>
                    <td><span><?= $row['security_name']  ?></span></td>
                    <td><span><?= $row['open_price']  ?></span></td>
                    <td><span><?= $row['high_price']  ?></span></td>
                    <td><span><?= $row['low_price']  ?></span></td>
                    <td><span><?= $row['close_price']  ?></span></td>
                    <td><span><?= $row['previous_day_close_price']  ?></span></td>
                    <td><span><?= $row['total_traded_quantity']  ?></span></td>
                    <td><span><?= $row['total_traded_value']  ?></span></td>
                    <td><span><?= $row['market_capitalization']  ?></span></td>


                </tr>
            <?php
                    }
            ?>

            </table>
        </div>


    </div>

</div>


<?php include './layout/footer.php'; ?>
</div>