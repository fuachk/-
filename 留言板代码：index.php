<!DOCTYPE html>

<html>
<head>
    <title>我的留言板</title>
</head>
<body>
    <center>
        <h2>我的留言板</h2>
        <a href="index.php" 添加留言 < /a><!-- 选择键-->
        <a href="show.php" 查找留言 < /a>
        <hr width="90">
        <h3>添加留言</h3>
        <?php
        /*添加留言*/


        $title= $_POST["title"] ;//数组接收数据
        $author=$_POST["author"];
        $content=$_POST["content"];
        $ip=$_SERVER["REMOTE_ADDR"];
        $adtime=time();
        $ly="{$title}##{$author}##{$content}##{$ip}##{$adtime}";//拼接留言
       // echo $ly;将留言传入txt文件
        $info=file_get_contents("message.txt");
        file_put_contents("message.txt",$info.$ly);
        echo "<br/>";//覆盖上条留言
        echo "成功留言";
        ?>
    </center>
</body>

</html>


