<?php
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-01%'");
	$clearancejan = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-01%' AND clearance_status = 'Incomplete'");
	$clearancejan1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-01%' AND clearance_status = 'Completed'");
	$clearancejan2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-02%'");
	$clearancefeb = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-02%' AND clearance_status = 'Incomplete'");
	$clearancefeb1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-02%' AND clearance_status = 'Completed'");
	$clearancefeb2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-03%'");
	$clearancemar = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-03%' AND clearance_status = 'Incomplete'");
	$clearancemar1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-03%' AND clearance_status = 'Completed'");
	$clearancemar2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-04%'");
	$clearanceapr = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-04%' AND clearance_status = 'Incomplete'");
	$clearanceapr1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-04%' AND clearance_status = 'Completed'");
	$clearanceapr2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-05%'");
	$clearancemay = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-05%' AND clearance_status = 'Incomplete'");
	$clearancemay1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-05%' AND clearance_status = 'Completed'");
	$clearancemay2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-06%'");
	$clearancejun = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-06%' AND clearance_status = 'Incomplete'");
	$clearancejun1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-06%' AND clearance_status = 'Completed'");
	$clearancejun2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-07%'");
	$clearancejul = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-07%' AND clearance_status = 'Incomplete'");
	$clearancejul1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-07%' AND clearance_status = 'Completed'");
	$clearancejul2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-08%'");
	$clearanceaug = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-08%' AND clearance_status = 'Incomplete'");
	$clearanceaug1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-08%' AND clearance_status = 'Completed'");
	$clearanceaug2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-09%'");
	$clearancesep = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-09%' AND clearance_status = 'Incomplete'");
	$clearancesep1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-09%' AND clearance_status = 'Completed'");
	$clearancesep2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-10%'");
	$clearanceoct = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-10%' AND clearance_status = 'Incomplete'");
	$clearanceoct1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-10%' AND clearance_status = 'Completed'");
	$clearanceoct2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-11%'");
	$clearancenov = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-11%' AND clearance_status = 'Incomplete'");
	$clearancenov1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-11%' AND clearance_status = 'Completed'");
	$clearancenov2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt = $pdo->query("SELECT count(*) AS total, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-12%'");
	$clearancedec = $stmt->fetch(PDO::FETCH_ASSOC);
	$stmt1 = $pdo->query("SELECT count(clearance_status) AS unfinished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-12%' AND clearance_status = 'Incomplete'");
	$clearancedec1 = $stmt1->fetch(PDO::FETCH_ASSOC);
	$stmt2 = $pdo->query("SELECT count(clearance_status) AS finished, datecreated FROM table_clearance WHERE datecreated LIKE '%2021-12%' AND clearance_status = 'Completed'");
	$clearancedec2 = $stmt2->fetch(PDO::FETCH_ASSOC);
?>