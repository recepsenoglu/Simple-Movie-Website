<?php
try {
	$db = new PDO("mysql:host=localhost;dbname=disenchantment;charset=utf8", "root", "root");

    // echo "bağlandı";
} catch ( PDOException $e ){


	print $e->getMessage();
	exit;

}


$Kullanici=$db->query("SELECT * FROM kullanici")->fetch();

/*echo "<pre>";
print_r($Kullanici);
echo "</pre>"; */
$array = array();
?>