<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product</title>
    <style>
        table  {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <h2>Data Product</h2>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Product Name</td>
                <td>Product Price</td>
                <td>Category</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php 
            $nomor =1;
            foreach($products as $value) :
            ?>
            <tr>
                <td><?= $nomor++; ?></td>
                <td><?= $value->product_name ?></td>
                <td><?= $value->product_price ?></td>
                <td><?= $value->category_name ?></td>
                <td></td>
            </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>