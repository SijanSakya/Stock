<?php
include './php/config/autoload.php';

$mystock = $user->read_mystock();

?>


<?php include './layout/header.php'; ?>
<?php include './layout/sidebar.php'; ?>


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
                    <th>Avg Price</th>
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
</div>
<!--Footer Begins-->
<?php include './layout/footer.php'; ?>