   <?php 
    //��login.php ���н������Ӷ��ж��û����������Ƿ�Ϸ�
    $dbhost = 'localhost:3306';  // mysql������������ַ
    $dbuser = 'root';            // mysql�û���
    $dbpass = '123456';          // mysql�û�������
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
    if(! $conn )
    {
        die('Could not connect: ' . mysqli_error());
    } 
    $username = $_POST['username']; //��ȡ idΪusername��Ͷ�ݺ��� 
    $flag=$_POST['flag'];
    if($flag==1){//������û������
    $sql = "select user_id from sheet1 where user_name='$username'";
    }else if($flag==2){//�����������
    $sql = "select user_id from sheet1 where email='$username'";     
    }
    mysqli_select_db( $conn, "USER");
    $retval = mysqli_query( $conn, $sql );
    $row = mysqli_fetch_array($retval);
    if(!empty($row))echo "already exsit!";
    //else echo "available!";
    
    ///��php�е�echo�е��ı� ����ajax�е�����ı�
    
   