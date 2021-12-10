<!DOCTYPE html>
<head>
    <title>Laporan Inventory</title>
</head>
<body>
<center><h2>Laporan Inventory - <?= date('d F Y') ?></h2></center>
<table border="1" width="100%">
    <thead>
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Device Status</th>
        <th>Jumlah</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data->rows as $row){ ?>
        <tr>
            <td>
                <?= $row->name;?>
            </td>
            <td>
                <?= $row->category;?>
            </td>
            <td>
                <?= $row->device_status;?>
            </td>
            <td>
                <?= $row->jumlah;?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>