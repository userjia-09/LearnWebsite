<?php
$dbhost = 'localhost:3306';  // mysql������������ַ
$dbuser = 'root';            // mysql�û���
$dbpass = '123456';          // mysql�û�������
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('����ʧ��: ' . mysqli_error($conn));
}
//echo '���ӳɹ�<br />';
mysqli_select_db($conn, 'USER' );              //�������ݿ�

$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();
$query = mysqli_query($conn ,"select user_id,token_exptime from sheet1 where status='0' and token='$verify'");
$row = mysqli_fetch_array($query);
if($row)
{
    if($nowtime>$row['token_exptime'])
    { 
        $msg = '���ļ�����Ч���ѹ������¼�����ʺ����·��ͼ����ʼ�.';
    }
    else
    {
        mysqli_query($conn,"update sheet1 set status=1 where user_id=".$row['user_id']);
        if(mysqli_affected_rows($conn)!=1) die(0);
        $msg = '����ɹ���';
    }
}
else
{
    $msg = 'error.';
}
echo $msg;

