<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="font-awesome.css">
<link rel="stylesheet" type="text/css" href="font-awesome.min.css">
	<title></title>
	<style type="text/css">
		p{
			display: inline;
		}
	</style>
</head>
<body>
<?php
	function get_currency($amount, $from, $to) {
	    if($from == 'THB'){
	    	if($to == 'USD'){
	    		$result = $amount * 0.03;
	    	}else if($to == 'EUR'){
	    		$result = $amount * 0.03;
	    	}
	    }else if($from == 'USD'){
	    	if($to == 'EUR'){
	    		$result = $amount * 0.9;
	    	}else if($to == 'THB'){
	    		$result = $amount * 35;
	    	}
	    }else if($from == 'EUR'){
	    	if($to == 'USD'){
	    		$result = $amount * 1;
	    	}else if($to == 'THB'){
	    		$result = $amount * 37;
	    	}
	    }
	    return $result;
	}

	if (isset($_GET['submit'])) {
		
		$val1 = htmlentities($_GET['from']);
	    $val2 = htmlentities($_GET['to']);
	    $money = htmlentities($_GET['num']);
	    if($val1==$val2){
		    echo "";
		    $result = $money;
		}else{
		   	$result = get_currency($money,$val1, $val2);
		}
	    $moneylast = $money." ".$val1;
	    $resultlast = $result." <br>".$val2;
	}
?>
<script>
	function myFunction() {
	    document.getElementById("from").innerHTML = "<?php echo $moneylast ?>";
	    document.getElementById("to").innerHTML = "<?php echo $resultlast ?>";
	}
</script>
<div class="wrap-head">
	<h1 class="head">EXCHANGE RATE</h1>
	<img src="ic.png" width="110" height="110">
</div>
<div class="wrap-box">
<div class="box">


<form  method="GET">
	<input type="text" name="num" placeholder="money"><br>
	<span class="highlight"></span>
      <span class="bar"></span>

	<select name="from">
	  <option value="THB">THB</option>
	  <option value="EUR">EUR</option>
	  <option value="USD">USD</option>
	</select> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right fa-lg"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	
	<select name="to">
	  <option value="THB">THB</option>
	  <option value="EUR">EUR</option>
	  <option value="USD">USD</option>
	</select>
<div class="css">
	<input type="submit" name="submit" value="PUSH" onclick="myFunction()">
	
	</input>


</div>
</form>


</div>
<div class="result">
<h4>
<?php  

	if(isset($moneylast)&&isset($resultlast)){
		echo $result;
	}
?>
</h4>
<p>
<?php  

	if(isset($moneylast)&&isset($resultlast)){
		echo $val2;
	}
?>
</p>
</div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<!-- <p id="from">    0 xxx </p> : <p id="to">    0 xxx </p> -->
</body>
</html>