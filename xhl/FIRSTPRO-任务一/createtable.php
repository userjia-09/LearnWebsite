<?php
// �������ݱ�
$dbhost = 'localhost:3306';  // mysql������������ַ
$dbuser = 'root';            // mysql�û���
$dbpass = '123456';          // mysql�û�������
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('����ʧ��: ' . mysqli_error($conn));
}
echo '���ӳɹ�<br />';
$sql = "CREATE TABLE sheet1( ".
        "user_id       INT NOT NULL AUTO_INCREMENT, ".//�û�id
        "user_name     VARCHAR(40) NOT NULL, ".//�û���
        "password      VARCHAR(40) NOT NULL, ".//�û�����
        "email         VARCHAR(60) NOT NULL, ".//����
        "token         VARCHAR(40) NOT NULL, ".//������
        "token_exptime INT(10) NOT NULL, ".//��������Ч��
        "status        TINYINT(1) NOT NULL, ".//����״̬
        "regtime       INT(10) NOT NULL, ".//ע��ʱ��
        "PRIMARY KEY ( user_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_select_db( $conn, 'USER' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('���ݱ���ʧ��: ' . mysqli_error($conn));
}
echo "���ݱ����ɹ�\n";
mysqli_close($conn);
?>