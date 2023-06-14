<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
	<title>Panel Administratora</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#">Sklep Internetowy</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="?action=home">Panel Główny</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?action=orders">Zamówienia</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Produkty</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Klienci</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Ustawienia</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container mt-4">
		<h1>Panel Administratora</h1>
		<?php
		// Sprawdź, czy został wysłany parametr "action"
		if (isset($_GET['action'])) {
			if ($_GET['action'] == 'orders') {
		?>
				<form class="mt-4">
					<div class="row">
						<div class="col-md-3">
							<label for="order-id" class="form-label">ID Zamówienia:</label>
							<input type="text" class="form-control" id="order-id">
						</div>
						<div class="col-md-3">
							<label for="customer-id" class="form-label">ID Klienta:</label>
							<input type="text" class="form-control" id="customer-id">
						</div>
						<div class="col-md-3">
							<label for="order-date" class="form-label">Data</label>
							<input type="date" class="form-control" id="order-date">
						</div>
						<div class="col-md-3">
							<label for="order-status" class="form-label">Status Zamówienia:</label>
							<select class="form-select" id="order-status">
								<option value="">Wybierz status</option>
								<option value="pending">Oczekujące</option>
								<option value="processing">W trakcie realizacji</option>
								<option value="completed">Zrealizowane</option>
								<option value="canceled">Anulowane</option>
							</select>
						</div>
						<div class="col-md-3">
							<label class="invisible">.</label> <!-- Ukryty label dla wyrównania przycisku -->
							<button type="submit" class="btn btn-primary">Szukaj</button>
						</div>
					</div>
				</form>
				<?php


				// Tutaj można umieścić kod PHP do pobierania zamówień z bazy danych
				// np. $orders = fetchOrdersFromDatabase();
				$orders = [
					['id' => 1, 'customer_id' => 123, 'status' => 'Zrealizowane', 'total' => 50.0],
					['id' => 2, 'customer_id' => 456, 'status' => 'W trakcie realizacji', 'total' => 100.0],
					['id' => 3, 'customer_id' => 789, 'status' => 'Oczekujące', 'total' => 25.0],
				];
				?>
				<h2>Zamówienia</h2>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>ID klienta</th>
							<th>Status</th>
							<th>Data</th>
							<th>Kwota</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($orders as $order) { ?>
							<tr>
								<td><?php echo $order['id']; ?></td>
								<td><?php echo $order['customer_id']; ?></td>
								<td><?php echo $order['status']; ?></td>
								<td><!--Miejsce na datę--></td>
								<td><?php echo $order['total'];
									echo "zł"; ?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

		<?php } elseif ($_GET['action'] == 'home') {
				echo '<p>Witaj w panelu administratora sklepu internetowego.</p>';
			}
		} else {
			// Domyślne wyświetlanie panelu głównego
			echo '<p>Witaj w panelu administratora sklepu internetowego.</p>';
		}
		?>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>