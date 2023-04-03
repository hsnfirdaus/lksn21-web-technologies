<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<title>Pagination</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<main id="container">
		<?php
		$data = json_decode(file_get_contents('data.json'), TRUE);
		$page = is_numeric(@$_GET['page']) ? $_GET['page'] : 1;
		$limit = 5;
		$start = ($page - 1) * $limit;
		$total_page = ceil((count($data) - 1) / $limit);
		$items = array_slice($data, $start, $limit);
		?>
		<h1>Data Pagination Halaman
			<?php echo $page; ?>
		</h1>
		<section class="item-list">
			<?php
			foreach ($items as $item) {
				?>
				<div class="item">
					<h2>
						<?php echo $item['name']; ?>
					</h2>
					<ul>
						<li>Age :
							<?php echo $item['age']; ?>
						</li>
						<li>Gender :
							<?php echo $item['gender']; ?>
						</li>
						<li>Company :
							<?php echo $item['company']; ?>
						</li>
						<li>Email :
							<?php echo $item['email']; ?>
						</li>
						<li>Phone :
							<?php echo $item['phone']; ?>
						</li>
						<li>Address :
							<?php echo $item['address']; ?>
						</li>
					</ul>
				</div>
				<?php
			}
			?>
		</section>
		<nav id="paging">
			<?php
			$paging_size = 4;
			$each_side_size = ($paging_size / 2);
			if ($page > 1) {
				?>
				<a href="?page=<?php echo $page - 1; ?>">&lt;</a>
				<?php
			} else {
				?>
				<span>&lt;</span>
				<?php
			}
			$addition = 0;
			if ($total_page - $page < $each_side_size) {
				$addition = $each_side_size - ($total_page - $page);
			}
			for ($i = $each_side_size + $addition; $i >= 1; $i--) {
				if ($page - $i > 0) {
					$paging_size--;
					?>
					<a href="?page=<?php echo $page - $i; ?>"><?php echo $page - $i; ?></a>
					<?php
				}
			}
			?>

			<span>
				<?php echo $page; ?>
			</span>
			<?php
			for ($i = 1; $i <= $paging_size; $i++) {
				if ($page + $i <= $total_page) {
					?>
					<a href="?page=<?php echo $page + $i; ?>"><?php echo $page + $i; ?></a>
					<?php
				}
			}
			if ($page < $total_page) {
				?>
				<a href="?page=<?php echo $page + 1; ?>">&gt;</a>
				<?php
			} else {
				?>
				<span>&gt;</span>
				<?php
			}
			?>
		</nav>
	</main>
</body>

</html>