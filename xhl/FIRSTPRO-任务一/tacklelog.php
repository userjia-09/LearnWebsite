<?php
//�����½
$dbhost = 'localhost:3306';  // mysql������������ַ
$dbuser = 'root';            // mysql�û���
$dbpass = '123456';          // mysql�û�������
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(!$conn) 
{
die('����ʧ��: '.mysqli_error($conn));
}
//echo '���ӳɹ�<br />';
mysqli_select_db($conn, 'USER' );             //ѡ����Ӧ���ݿ�
$username = $_POST['name'];
$password = md5($_POST['password']);
$query = mysqli_query($conn ,"select user_id,status from sheet1 where user_name ='$username' and password='$password'");
$row = mysqli_fetch_array($query);
if(!empty($row)) 
{
    if($row['status']==1)echo "��½�ɹ�";
    else echo "�����˺Ż�δ���м���,�뼤����ٽ��е�¼";
}
else  echo "��½ʧ�� ���������Ƿ���ȷ";

 
    

