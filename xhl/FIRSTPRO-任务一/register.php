<?php 
$dbhost = 'localhost:3306';  // mysql������������ַ
$dbuser = 'root';            // mysql�û���
$dbpass = '123456';          // mysql�û�������
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('Could not connect: ' . mysqli_error());
}
//echo '���ݿ����ӳɹ���';

mysqli_select_db( $conn, 'USER' );                        //ѡ�����ݿ�
$username = stripslashes(trim($_POST['username']));   
$password = md5(trim($_POST['password']));                 //�������� 
$email = trim($_POST['email']);                            //���� 
$regtime = time();                                         //ע��ʱ��
$token = md5($username.$password.$regtime);                //�������ڼ���ʶ���� 
$token_exptime = time()+60*60*24;                          //���ü�������Чʱ��,����ʱ��Ϊ24Сʱ�� 
 

$sql = "INSERT INTO sheet1 ".
    "(user_name,password, email,token,token_exptime,regtime) ".
    "VALUES ".
    "('$username','$password','$email','$token','$token_exptime','$regtime')";

$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('�޷���������: ' . mysqli_error($conn));
}
//echo "���ݲ���ɹ�\n";

include_once "class.phpmailer.php";//��ȡһ���ⲿ�ļ�������
include_once "class.smtp.php";
$mail=new PHPMailer();
$mail->SMTPDebug = 2;              //���õ�����Ϣ  �������Ϊ1����2 ���Ͳ��ɹ������������Ϣ
$body = "�װ���".$username."��<br/>��л������վע�������ʺš�<br/>�������Ӽ��������ʺš�<br/>
    <a href='http://localhost:8080/FIRSTPRO/active.php?verify=".$token."' target=            //��Ӧ�����˺ŵ�php�ļ�url
'_blank'>http://localhost:8080/FIRSTPRO/active.php?verify=".$token."</a><br/>
    ������������޷��������Ҳû�а취��";
//����smtp����
$mail->IsSMTP();
$mail->SMTPAuth=true;
$mail->SMTPKeepAlive=true;
$mail->SMTPSecure= "ssl";
//$mail->SMTPSecure= "tls";
$mail->Host="smtp.qq.com";
$mail->Port=465;
//$mail->Port=587;

//��дemail�˺ź�����
$mail->Username="2939906971@qq.com";  //���÷��ͷ�
$mail->Password="ctyujctajtgbdgef";   //ע������ҲҪ��д��Ȩ�������������QQ���俪��SMTP���ᵽ�ģ������������¼������Ŷ��
$mail->From="2939906971@qq.com";      //���÷��ͷ�
$mail->FromName="��ͩ��";
$mail->Subject="��**������һ���ʼ�";
$mail->AltBody=$body;
$mail->WordWrap=50;                  // �����Զ�����
$mail->MsgHTML($body);
$mail->AddReplyTo("2939906971@qq.com","��**");//���ûظ���ַ
$mail->AddAddress($email,"hello");  //�����ʼ����շ������������
$mail->IsHTML(true);                //ʹ��HTML��ʽ�����ʼ�
if(!$mail->Send()){//ͨ��Send���������ʼ�,���ݷ��ͽ������Ӧ����
    echo "Mailer Error:".$mail->ErrorInfo;
}else{
    echo "Message has been sent"; }
