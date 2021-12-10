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
	<div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
		<div class="w-2/4">
			<div class="flex">
				<div class="flex-1">
					<a href="<?php echo site_url('inventory/index')?>" class="bg-purple-600 px-2 py-2 rounded-md text-white border-white border-2 hover:bg-purple-700">
						<span class="fa fa-arrow-circle-left"></span> Data Inventaris
					</a>
				</div>
			</div>
			<div class="bg-white shadow-md rounded my-6 px-4 py-8">
				<h3 class="font-semibold text-lg">Form Barang</h3>
				<p class="text-sm text-gray-500">Form untuk menambah data barang baru</p>
				<div class="border-t-2 mt-2"></div>
				<form class="w-full mt-4" action="<?php echo site_url('inventory/create')?>" method="post">
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
								Nama
							</label>
							<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="txt_name" name="txt_name" type="text" placeholder="Jane">
							<p class="text-red-500 text-xs italic">Please fill out this field.</p>
						</div>
						<div class="w-full md:w-1/2 px-3">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
								Gambar
							</label>
							<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="image" name="image" type="file" placeholder="Doe">
						</div>
					</div>
					<div class="flex flex-wrap -mx-3 mb-6">
						<div class="w-full px-3">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
								Kategori
							</label>
							<select class="block w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="category" name="category">
								<option selected>New Mexico</option>
								<option>Missouri</option>
								<option>Texas</option>
							</select>

						</div>
					</div>
					<div class="flex flex-wrap -mx-3 mb-2">
						<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
								Status Device
							</label>
							<div class="relative">
								<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="status" name="status">
									<option selected>ON</option>
									<option>OFF</option>
								</select>
								<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
									<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
								</div>
							</div>
						</div>
						<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
							<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
								Jumlah
							</label>
							<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="txt_jumlah" name="txt_jumlah" type="number" placeholder="1">
						</div>
					</div>
					<button type="submit" name="btnSubmit" id="btnSubmit" class="bg-blue-500 px-4 py-2 text-white rounded-md mt-4">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
