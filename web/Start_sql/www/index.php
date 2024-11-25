<?php
echo "get id\n";

// 数据库连接参数
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "tyctf";

// 创建数据库连接
$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(preg_match('/\s/',$id)){
        die("hacker!");
    }
    // 执行查询语句
    $sql = "SELECT * FROM user WHERE id=".$id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 将查询结果转换为数组并打印出来
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        print_r($rows);
    } else {
        echo "没有找到匹配的记录";
    }

}

// 关闭数据库连接
$conn->close();
?>