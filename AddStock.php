<?php
include './php/config/autoload.php';


extract($_POST);
$stock = $user->read_stocktype();
$sym = $user->read_company();

if (isset($submit)) {
	$mystock = new myStock('', $scrip_sym, $quantity, $price, $stocktype_id, $transaction_date, '', '', '', '', '');
	$result = $user->create_mystock($mystock);

	if ($result) {
		header("Location:AddStock.php");
	}
	print "error";
	die;
}





?>



<?php include './layout/header.php'; ?>
<?php include './layout/sidebar.php'; ?>
<!-- HEADER ENDS -->

<div id="content" class="app-content">

	<div class="container">
		<div class="row">


			<div class="col-xl-6">
				<div class=" fs-12px text-muted mb-3"><b>Form</b></div>

				<form method="POST" action="#">
					<div class="mb-3 row">
						<label for="scrip_sym" class="col-sm-2 col-form-label">Symbol</label>
						<div class="col-sm-10">
							<select class="js-select2-symbol" name="scrip_sym">
								<?php
								while ($row = mysqli_fetch_assoc($sym)) {
								?>
									<option value="<?= $row['symbol'] ?>"><?= $row['symbol'] ?> / <?= $row['security_name'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="stock_type" class="col-sm-2 col-form-label">Stock Type</label>
						<div class="col-sm-10">
							<select class="js-select2-stockType" name="stocktype_id">
								<?php
								while ($row = mysqli_fetch_assoc($stock)) {
								?>
									<option value="<?= $row['stocktype_id'] ?>"><?= $row['name'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
						<div class="col-sm-10">
							<input type="text" name="quantity" class="form-control" id="">
						</div>
					</div>
					<div class="mb-3 row">
						<label for="Price" class="col-sm-2 col-form-label">Price</label>
						<div class="col-sm-10">
							<input type="text" name="price" class="form-control" id="">
						</div>
					</div>

					<div class="mb-3 row">
						<label for="transaction_date" class="col-sm-2 col-form-label">transaction date</label>
						<div class="col-sm-10">
							<input type="date" name="transaction_date" class="form-control" id="">
						</div>
					</div>


					<div class="mb-3 row">
						<div class="col-sm-10 offset-sm-2">
							<button type="submit" name="submit" class="btn btn-primary">Add</button>
						</div>
					</div>
				</form>
			</div>








			<div class="col-xl-6" style="padding-left: 50px;">
				<div class=" fs-12px text-muted mb-3"><b>Detail</b></div>

				<form method="POST">
					<div class="mb-3 row">
						<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
						<div class="col-sm-10">
							<label for="quantity" class="col-sm-2 col-form-label">10</label>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="price" class="col-sm-2 col-form-label">price</label>
						<div class="col-sm-10">
							<label for="price" class="col-sm-2 col-form-label">2000</label>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="stockType" class="col-sm-2 col-form-label">stockType</label>
						<div class="col-sm-10">
							<label for="stockType" class="col-sm-2 col-form-label">stockType</label>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="commision" class="col-sm-2 col-form-label">commision</label>
						<div class="col-sm-10">
							<label for="commision" class="col-sm-2 col-form-label">0.36%*AMt</label>
						</div>
					</div>
					<div class="mb-3 row">
						<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
						<div class="col-sm-10">
							<label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php include './layout/footer.php'; ?>

</div>