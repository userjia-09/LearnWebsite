<?php 
//�������ݿ�
$dbhost = 'localhost:3306';   //mysql������������ַ
$dbuser = 'root';             //mysql�û���
$dbpass = '123456';            //mysql�û�������
$link = mysqli_connect($dbhost,$dbuser,$dbpass);
if(!$link)
{
    die('���Ӵ���'.mysqli_error($link));
}
echo "���ӳɹ���";
$sql = 'CREATE DATABASE USER';
$retval = mysqli_query($link, $sql);
if(!$retval)
{
    die('�������ݱ�: '.mysqli_error($link));
}
echo "���ݿ� USER �����ɹ�\n";
mysqli_close($link);
