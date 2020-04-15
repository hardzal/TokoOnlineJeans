<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<style type="text/css">
		.container {
			margin: 100px;
		}
		.left {
			float: left;
			width: 48%;
		}
		.right {
			float: right;
			width: 50%;
		}
		.frame{  
        /*margin: 20px;*/
        height: 150px;
        /*border: 1px solid black;*/
        position: relative;
    	}    
	    img{  
	        max-height: 100%;  
	        max-width: 100%; 
	        position: absolute;  
	        top: 0;  
	        bottom: 0;  
	        left: 0;  
	        right: 0;  
	        margin: auto;
	    }
	    .bold {
	    	font-weight: bold;
	    }
	    body {
	    	font-family: Arial, Helvetica, sans-serif;
	    }
	    .uppercase {
	    	text-transform: uppercase;
	    }
	    .right td {
	    	padding: 5px;
	    }
	    .list-harga td {
	    	padding: 10px;	
	    }
	    .list-harga tr#row1 {
	    	background-color: lightgray;
	    	font-weight: bold;
	    }
	    .list-harga tr#item-row { 
	      padding: 10px; 
	      border-bottom: 2px solid lightgray; 
	      }
	</style>
</head>
<body>
	<div class="container">
		<section style="margin: 0px 0px 40px; overflow: auto;">
			<div class="left">
				<table>
					<tr><td><h4 class="uppercase">Bill from :</h4></td></tr>
					<tr><td><span style="font-weight: bold;">Denim Factory</span></td></tr>
					<tr><td><span>Jalan H.R.Rasuna Said RT.02/RW.02</span></td></tr>
					<tr><td><span>Kuningan Barat</span></td></tr>
					<tr><td><span>Mampang Prapatan</span></td></tr>
					<tr><td><span>Jakarta Selatan</span></td></tr>
				</table>			
			</div>
			<div class="right frame" >
				<img src="logo.jpeg" alt="logo">
			</div>
		</section>
		<hr>
		<section style="padding-top: 40px; overflow: auto;">
			<div class="left">
				<table>
					<tr><td><h4 class="uppercase">Bill to :</h4></td></tr>
					<tr><td><span style="font-weight: bold;">[Nama Customer]</span></td></tr>
					<tr><td><span>[No HP]</span></td></tr>
					<tr><td><span>[Alamat]</span></td></tr>
					<tr><td><span>[Email]</span></td></tr>
				</table>
				<!-- <span>Jakarta Selatan</span> -->	
			</div>
			<div class="right">
				<table  style="margin-top: 20px; width: 80%; border-collapse: collapse;" border="0" align="right">
					<tr>
						<td class="bold">No. Pembayaran</td>
						<td align="right">[151524415]</td>
					</tr>
					<tr>
						<td class="bold">Tgl Pembayaran</td>
						<td align="right">[10 April 2020]</td>
					</tr>
					<tr>
						<td class="bold" style="background-color: lightgray;">Total Pembayaran</td>
						<td class="bold" style="background-color: lightgray;" align="right">Rp [4.000.000]</td>
					</tr>
				</table>
			</div>
		</section>
		<section  style="padding-top: 40px; overflow: auto;" class="list-harga">
			<table style="width: 100%; border-collapse: collapse;">
				<tr id="row1">
					<td>Nama Barang</td>
					<td>Ukuran</td>
					<td style="text-align: right;">Jumlah</td>
					<td style="text-align: right;">Harga Satuan</td>
					<td style="text-align: right;">Total Harga Barang</td>
				</tr>
				<tr id="item-row">
					<td>Nama Barang</td>
					<td>Ukuran</td>
					<td style="text-align: right;">Jumlah</td>
					<td style="text-align: right;">Harga Satuan</td>
					<td style="text-align: right;">Total Harga Barang</td>
				</tr>
				<tr id="item-row">
					<td>Nama Barang</td>
					<td>Ukuran</td>
					<td style="text-align: right;">Jumlah</td>
					<td style="text-align: right;">Harga Satuan</td>
					<td style="text-align: right;">Total Harga Barang</td>
				</tr>
			</table>
		</section>
		<section style="padding-top: 40px; overflow: auto; margin-bottom: 70px;">
			<div class=" right">
				<table  style="margin-top: 20px; width: 80%; border-collapse: collapse;" border="0" align="right">
					<tr>
						<td class="bold" style="padding-left: 20px;">Sub Total</td>
						<td align="right" style="padding-right: 20px;">Rp [4.000.000]</td>
					</tr>
					<tr>
						<td class="bold" style="padding-left: 20px;">Diskon</td>
						<td align="right" style="padding-right: 20px;">Rp [4.000.000]</td>
					</tr>
					<tr>
						<td class="bold" style="background-color: lightgray; padding-left: 20px;">Total</td>
						<td class="bold" style="background-color: lightgray; padding-right: 20px;" align="right" >Rp [4.000.000]</td>
					</tr>
				</table>
			</div>
		</section>
		<hr style="color: lightray;">
	</div>
</body>
</html>