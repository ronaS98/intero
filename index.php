<!DOCTYPE html>
<head>
<link rel="shortcut icon" href="basketball.png">
	<title> Informasi Pemain Basket </title>
	<style type="text/css">
		body{
			font-family: Segoe UI;
		}
		.mainBorder{
			margin: 10px;
			border: 0px;
			background-color: #f9c700;
			width: 50%;
			border-radius: 10px;
			padding-top: 20px;
			color: white;
			font-weight: bold;
		}

		.tabel{
			background-color: #f7f7f7;
		 	border-radius: 10px;
			width: 50%;
			padding: 10px;
			line-height: 30px;
		}
		#flag{
			background-color: #f7f7f7;
		 	border-radius: 10px;
			width: 49%;
			padding: 10px;
			margin: 20px;
		}
	</style>
</head>
<html>
<body>
	<center>
	<div class="mainBorder">
	    <form action="" method="GET">
	    	<label for="name" > Masukkan Nama Pemain Basket : </label>
	        <input type="text" name="id">
	        <input type="submit">
	    </form>
	    <br>
		</center>
	    <?php

	        if(!empty($_GET['id'])){
	            $_api = file_get_contents("https://www.balldontlie.io/api/v1/players?search=".$_GET['id']."");  
	            $json = json_decode($_api, true); 
	    ?>
	    <center>
	    <?php for($i=0;$i<count($json['data']);$i++) { ?>
	    <table class="tabel">
	    	
	        <!-- Menampilkan nama negara -->
	    	<tr>
	            <td>Nama Lengkap</td>
	            <td > : 
	            	<?php 
    					echo "".$json['data'][$i]['first_name']." ".$json['data'][$i]['last_name'] ;
    				?> 
				</td>
	        </tr>

			<tr>
	            <td>Kota</td>
	            <td > : 
	            	<?php 
    					echo "".$json['data'][$i]['team']['city'] ;
    				?> 
				</td>
	        </tr>

	        <tr>
	            <td>Divisi</td>
	            <td > : 
	            	<?php 
    					echo "".$json['data'][$i]['team']['division'] ;
    				?> 
				</td>
	        </tr>

			
	    	<tr>
	            <td>Posisi</td>
	            <td > : 
	            	<?php 
    					echo "".$json['data'][$i]['position'] ;
    				?> 
				</td>
	        </tr>

	        <tr>
	            <td>Tinggi (Inci) </td>
	            <td > : 
	            	<?php 
    					echo "".$json['data'][$i]['height_inches'] ;
    				?> 
				</td>
	        </tr>
	     
	    </table>
	    <br>
	    <?php }?>
	    <?php  }
	        else{
	        	echo "<center>Masukkan nama pemain basket!</center>"; //jika tidak ada data yg diinput
	        } ?>
	</div>
	</center>
</body>
</html>