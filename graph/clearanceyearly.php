<?php
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2021%'");
	$clearanceyrjan = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2021%' AND clearance_status = 'Incomplete'");
	$clearanceyrjan1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2021%' AND clearance_status = 'Completed'");
	$clearanceyrjan2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2022%'");
	$clearanceyrfeb = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2022%' AND clearance_status = 'Incomplete'");
	$clearanceyrfeb1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2022%' AND clearance_status = 'Completed'");
	$clearanceyrfeb2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2023%'");
	$clearanceyrmar = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2023%' AND clearance_status = 'Incomplete'");
	$clearanceyrmar1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2023%' AND clearance_status = 'Completed'");
	$clearanceyrmar2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2024%'");
	$clearanceyrapr = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2024%' AND clearance_status = 'Incomplete'");
	$clearanceyrapr1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2024%' AND clearance_status = 'Completed'");
	$clearanceyrapr2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2025%'");
	$clearanceyrmay = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2025%' AND clearance_status = 'Incomplete'");
	$clearanceyrmay1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2025%' AND clearance_status = 'Completed'");
	$clearanceyrmay2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2026%'");
	$clearanceyrjun = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2026%' AND clearance_status = 'Incomplete'");
	$clearanceyrjun1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2026%' AND clearance_status = 'Completed'");
	$clearanceyrjun2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2027%'");
	$clearanceyrjul = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2027%' AND clearance_status = 'Incomplete'");
	$clearanceyrjul1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2027%' AND clearance_status = 'Completed'");
	$clearanceyrjul2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2028%'");
	$clearanceyraug = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2028%' AND clearance_status = 'Incomplete'");
	$clearanceyraug1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2028%' AND clearance_status = 'Completed'");
	$clearanceyraug2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2029%'");
	$clearanceyrsep = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2029%' AND clearance_status = 'Incomplete'");
	$clearanceyrsep1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2029%' AND clearance_status = 'Completed'");
	$clearanceyrsep2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2030%'");
	$clearanceyroct = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2030%' AND clearance_status = 'Incomplete'");
	$clearanceyroct1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2030%' AND clearance_status = 'Completed'");
	$clearanceyroct2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2031%'");
	$clearanceyrnov = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2031%' AND clearance_status = 'Incomplete'");
	$clearanceyrnov1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2031%' AND clearance_status = 'Completed'");
	$clearanceyrnov2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM clearance_archive WHERE datecreated LIKE '%2032%'");
	$clearanceyrdec = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2032%' AND clearance_status = 'Incomplete'");
	$clearanceyrdec1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM clearance_archive WHERE datecreated LIKE '%2032%' AND clearance_status = 'Completed'");
	$clearanceyrdec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
?>