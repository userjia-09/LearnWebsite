
<?php
$dbhost = 'localhost:3306';  // mysql������������ַ
$dbuser = 'root';            // mysql�û���
$dbpass = '123456';          // mysql�û�������
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
echo '���ݿ����ӳɹ���';

//mysqli_close($conn);
?>
