<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SMART CAMPUS|Data Inventaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-blueGray-50">
<!-- component -->
<div class="overflow-x-auto">
    <div class="min-w-screen min-h-screen bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-2/4 lg:w-5/6">
            <div class="flex">
                <div class="flex-1">
                    <h1 class="text-2xl font-bold">Inventaris Barang</h1>
                </div>
                <div class="flex-1">
                    <a href="<?php echo site_url('/inventory/create/');?>" class="bg-purple-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-purple-700">
                        Buat Baru <span class="fa fa-plus-circle"></span>
                    </a>
                    <a href="<?php echo site_url('/inventory/export_excel/');?>" class="bg-green-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-green-700">
                        Export Excel <span class="fa fa-file-excel"></span>
                    </a>
                    <a href="<?php echo site_url('/inventory/laporan_pdf/');?>" target="_blank" class="bg-red-600 px-2 py-2 rounded-md text-white float-right border-white border-2 hover:bg-red-700">
                        Export PDF <span class="fa fa-file-pdf"></span>
                    </a>
					<a href="<?php echo site_url('/dashboard');?>" target="_blank" class="bg-blue-600 px-2 py-2
					rounded-md text-white float-right border-white border-2 hover:bg-blue-700">
						Page Dashboard <span class="fa fa-rocket"></span>
					</a>
                </div>
            </div>
            <div class="bg-white shadow-md rounded my-6 px-4 py-2">
                <h3 class="font-semibold text-lg">Data Barang</h3>
                <form action="<?= site_url('inventory/index') ?>" method="post">
                <div class="flex space-x-2">
                    <div class="w-4/12 mt-2 mb-2 border-2 py-1 px-3 flex justify-between rounded-md">
                        <input class="flex-grow outline-none text-gray-600 focus:text-blue-600" type="text" name="barang" placeholder="Cari Barang..." />
                    </div>
                    <div class="mt-2 mb-2 border-2 py-1 px-3 flex justify-between rounded-md">
                        <select name="" id="" class="flex-grow outline-none text-gray-600 focus:text-blue-600">
                            <option value="">Semua Kategori</option>
                        </select>
                    </div>
                    <div class="py-3 px-2">
                        <input type="submit" name="search" value="Search" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-2 rounded outline-none focus:outline-none ease-linear transition-all duration-150">
<!--                            Cari <span class="fa fa-search"></span>-->
<!--                        </input>-->
                    </div>
                </div>
                </form>
                <table class="min-w-max w-full table-auto mt-2">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Kategori</th>
                        <th class="py-3 px-6 text-center">Device Status</th>
                        <th class="py-3 px-6 text-center">Jumlah</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    <?php foreach($model->rows as $row){ ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">
                                <?= $row->name;?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <?= $row->category;?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <?php if($row->device_status == 1){ ?>
                                    <span class="bg-green-600 text-white py-1 px-3 rounded-full text-xs">ON</span>
                                <?php }else{ ?>
                                    <span class="bg-red-600 text-white py-1 px-3 rounded-full text-xs">OFF</span>
                                <?php } ?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <?= $row->jumlah;?>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a href="" class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="<?php echo site_url('/inventory/edit/'.$row->id);?>" class="w-4 mr-2 transform hover:text-green-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <a href="<?php echo site_url('/inventory/delete/'.$row->id);?>" onClick="return confirm('Yakin akan dihapus?')" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
