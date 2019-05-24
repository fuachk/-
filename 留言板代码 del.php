<!DOCTYPE html>
<html>
<head>
    <title>我的留言板</title>
</head>
<body>
<center>
    <h2>我的留言板</h2>
    <a href = "index.php">添加留言</a><!--路径-->
    <a href = "show.php" >查看留言</a>
    <hr width = "90%">
    <h3>删除留言</h3>

    <?php
    // 获取要删除留言号
    $id = $_GET["id"];
    // 从留言.txt中获取留言信息
    $info = file_get_contents("message.txt");//把整个文件(message.txt)读入一个字符串中

    //（将留言信息以@@@符号拆分成留言数组）
    $lylist = explode("@@@",$info);
    //使用unset删除指定的id留言
    unset($lylist[$id]);
    //还原留言信息为字串，并写回留言文件
    $newinfo = implode("@@@",$lylist);
    file_put_contents("message.txt",$newinfo);
    echo "删除成功！";



    ?>
</center>

</body>
</html>

