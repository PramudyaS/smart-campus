<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SMART CAMPUS|Buat Inventaris</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-blueGray-50">
<!-- component -->
<div class="overflow-x-auto">
	<?php
		$by_jumlah_name  = "";
		$by_jumlah_count = null;

		$category = "";
		$jumlah   = null;

		foreach ($order_jumlah as $item)
		{
			$by_jumlah_name .= "'$item->name'".",";
			$by_jumlah_count .= "$item->jumlah".",";
		}

		foreach ($categories as $item)
		{
			$category .= "'$item->category'".",";
			$jumlah .= "$item->jumlah".",";
		}
	?>
	<div class="min-w-screen min-h-screen bg-gray-100 bg-gray-100 font-sans overflow-hidden p-10">
		<div class="flex">
			<div class="flex-1">
				<h1 class="text-2xl font-bold">Dashboard Analytics</h1>
			</div>
			<div class="flex-1">
				<a href="<?php echo site_url('/inventory/create/');?>" class="bg-purple-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-purple-700">
					Page Barang <span class="fa fa-boxes"></span>
				</a>
			</div>
		</div>
		<div class="flex mt-10 p-5 justify-center">
			<div class="w-1/2">
				<h3 class="font-bold text-center">Data Perkategori</h3>
				<canvas id="kategoriChart" class="align-center mx-auto"></canvas>
			</div>
			<div class="w-1/2">
				<h3 class="font-bold text-center">Data Barang Terbanyak</h3>
				<canvas id="jumlahChart" height="350" width="350" class="align-center mx-auto"></canvas>
			</div>
		</div>
		<div class="bg-white shadow-md rounded my-6 px-4 py-2">
			<h3 class="font-semibold text-lg">Data Barang Terbaru</h3>
			<table class="min-w-max w-full table-auto mt-2">
				<thead>
				<tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
					<th class="py-3 px-6 text-left">Nama</th>
					<th class="py-3 px-6 text-left">Kategori</th>
					<th class="py-3 px-6 text-center">Device Status</th>
					<th class="py-3 px-6 text-center">Jumlah</th>
				</tr>
				</thead>
				<tbody class="text-gray-600 text-sm font-light">
				<?php foreach($current_data as $row){ ?>
					<tr class="border-b border-gray-200 hover:bg-gray-100">
						<td class="py-3 px-6 text-center">
							<?= $row->name;?>
						</td>
						<td class="py-3 px-6 text-center">
							<?= $row->category;?>
						</td>
						<td class="py-3 px-6 text-center">
							<?php if($row->device_status == "ON"){ ?>
								<span class="bg-green-600 text-white py-1 px-3 rounded-full text-xs"><?= $row->device_status;?></span>
							<?php }else{ ?>
								<span class="bg-red-600 text-white py-1 px-3 rounded-full text-xs"><?= $row->device_status;?></span>
							<?php } ?>
						</td>
						<td class="py-3 px-6 text-center">
							<?= $row->jumlah;?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js" integrity="sha512-tMabqarPtykgDtdtSqCL3uLVM0gS1ZkUAVhRFu1vSEFgvB73niFQWJuvviDyBGBH22Lcau4rHB5p2K2T0Xvr6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	var kategoriCanvas = document.getElementById("kategoriChart");
	var byJumlahCanvas = document.getElementById("jumlahChart");


	var oilData = {
		labels: [
			<?= $category ?>
		],
		datasets: [
			{
				data: [<?= $jumlah ?>],
				backgroundColor: [
					"#FF6384",
					"#63FF84",
					"#84FF63",
					"#8463FF",
					"#6384FF"
				]
			}],
	};

	var pieChart = new Chart(kategoriCanvas, {
		type: 'pie',
		data: oilData,
		options: {
			responsive: false,
			maintainAspectRatio: false
		}
	});

	var byJumlahData = {
		labels: [
			<?= $by_jumlah_name ?>
		],
		datasets: [
			{
				label: '# Jumlah Barang',
				data: [<?= $by_jumlah_count ?>],
				backgroundColor: [
					"#FF6384",
					"#63FF84",
					"#84FF63",
					"#8463FF",
					"#6384FF"
				]
			}],
	}

	var barChart = new Chart(byJumlahCanvas, {
		type: 'bar',
		data: byJumlahData,
		options: {
			responsive: false,
			maintainAspectRatio: false
		}
	});
</script>
</body>
</html>
