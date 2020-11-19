<html>
	<head>
		<style>
			table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #000000;
			  text-align: center;
			  height: 20px;
			  margin: 8px;
			}

		</style>
	</head>
	<body>
		<div style="font-size:64px; color:'#00BAFF'"><i>Product List</i></div>
		<p>
		<i>PT ALPHABET</i><br>
		Jakarta, Indonesia
		</p>
		<hr>
		<hr>
		<p></p>
		
		<table cellpadding="6" >
			<tr>
                <th><strong>No</strong></th>
                <th><strong>Product Name</strong></th>
				<th><strong>Item Category</strong></th>
				<th><strong>Unit Price</strong></th>
            </tr>
            <?php 
            $nomor =1;
            foreach($products as $value) :
            ?>
			<tr>
                <td><?= $nomor++; ?></td>
                <td><?= $value->product_name ?></td>
                <td><?= $value->category_name ?></td>
				<td><?= "Rp " . number_format($value->product_price,2,',','.')  ?></td>
            </tr>
            <?php 
            endforeach; 
            ?>
		</table>
	</body>
</html>