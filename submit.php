<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
</head>
<body>
<b>Web 掲示板</b><br><br>
<?php
$name = $_POST['name'];
$body = $_POST['body'];

if( $name=='' || $body=='' ){
 echo "全ての項目を記入して下さい。<br><br>\n";
 echo '<a href="javascript:history.back()">戻る</a>';
 echo "</body></html>\n";
 exit;
}

echo "名前: $name<br>";
echo "本文:";
echo nl2br(htmlspecialchars($body));
echo "<br><br>";

$date = date("Y/m/d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($ip);

$f = fopen("5.txt", "a");
fwrite($f, "$date,$ip,$host,$name\n");
fwrite($f, "$body\n<END>\n");


fclose($f);

$upfile = $_FILES['upfile']['tmp_name'];
$upfile_name = $_FILES['upfile']['name'];
$upfile_type = $_FILES['upfile']['type'];
move_uploaded_file($upfile,"upload/$upfile_name");

if ($upfile_name !== '') {
    $upload_dir = 'upload/';
    $upload_path = $upload_dir . basename($upfile_name);
    move_uploaded_file($upfile, $upload_path);
    echo "ファイルがアップロードされました: $upfile_name";
}
?>
<br>
投稿が終わりました。<br><br>
<a href="5.php">掲示板に戻る</a><br><br>
</body>
</html>