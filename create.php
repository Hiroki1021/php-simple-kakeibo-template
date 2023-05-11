<?php

include_once("./dbconnect.php");


//処理の流れ
//最初のゴール：新しい家計簿が追加されて、TOｐに戻る
//１、画面で入力された値の取得
//２、phpからMySQLへ接続
//３、SQL文を作成して、画面で入力された値をrecordsテーブルに追加

$date = $_POST["date"];
$title = $_POST["title"];
$amount = $_POST["amount"];
$type = $_POST["type"];

$sql = "INSERT INTO records(title, type, amount, date, created_at, updated_at) VALUE(:title, :type, :amount, :date, now(), now())";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":title", $title, PDO::PARAM_STR);
$stmt->bindParam(":type", $type, PDO::PARAM_INT);
$stmt->bindParam(":amount", $amount, PDO::PARAM_INT);
$stmt->bindParam(":date", $date, PDO::PARAM_STR);

$stmt->execute();

header("Location: ./index.php");
exit;