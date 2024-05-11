<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <title>今はまだ開発中です</title>
</head>

<body>
    <b>Web 掲示板</b><br>
    <pre>
<?php
$f = file_get_contents("5.txt");
$item = explode("\n<END>\n", $f);
for ($i = 0; $i < count($item) - 1; $i++) {
    list($header, $body) = explode("\n", $item[$i], 2);
    list($date, $ip, $host, $name) = explode(',', $header);
    list($text, $imgfile) = explode("\n$imgfile\n", $body);
    echo '<font color="#008000"><b>' . ($i + 1) . ": $date $host($ip) $name</b></font>\n";
    echo "$body\n";
    echo "<img src ='upload/$imgfile'>\n";
}
?>
</pre>
    <form enctype="multipart/form-data" action="5_submit.php" method="POST">
        氏名：<input type="text" name="name" size=20><br>
        <textarea name="body" rows=4 cols=80></textarea><br>
        添付ファイル：<input type="file" name="upfile" size=100><br>
        <input type="submit" value=" 記事を投稿する ">
    </form>
</body>

</html>