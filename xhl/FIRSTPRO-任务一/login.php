<html>  
<!-- ע��ҳ�� -->
<head>  
<meta http-equiv="content-type" content="text/html;charset=gb2312" />  
<title>�û�ע��</title>  
<script type="text/javascript"> 
 IUA=1;     //ҳ����ȫ�ֱ���    ���õ�״̬�� �ж��û����Ƿ����
 IEA=1;     //״̬��ǩ �ж������Ƿ��Ѿ���ע����
 CB=1;      //�ص��������������
 STATE=false;
function getXmlHttpObject(){  
    if(window.ActiveXObject){    
        xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");  
        }  
    else{  
        xmlHttpRequest=new XMLHttpRequest();  
        }  
    return xmlHttpRequest;  
}  
var myXmlHttpRequest=""; 
function checkName(flag){ //���þ��ǻ�ñ�ҳ�����Ӧ���ݲ����м���  ����flag�����жϼ�����������û�
	if(STATE)return ;
	STATE=true;
    myXmlHttpRequest=getXmlHttpObject();// ���øú������������� 
    if(myXmlHttpRequest){    
        var url="http://localhost:8080/FIRSTPRO/index.php";              //����Ϊ��Ӧ��PHP�ļ������ڲ�ѯ�Ƿ��Ѿ�������ͬ���û���
        var f="&flag="+flag;  //��־λ
        if(flag==1){  
        var data="username="+$("user").value;    //��ñ�ҳ���û����������  ����ȷ��Ͷ��ʱʹ�õļ�ֵ
        myXmlHttpRequest.onreadystatechange=chuli;
        }else if(flag==2){
        var data="username="+$("email").value;
        myXmlHttpRequest.onreadystatechange=chuli2;
        }
        CB=flag;  //���ûص������������
        myXmlHttpRequest.open("post",url,true); 
        myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");  
        //myXmlHttpRequest.onreadystatechange=chuli;  
        myXmlHttpRequest.send(data+f); //ͨ��send һ�δ��Ͷ������ 
        
        }  

}

//�ص�����  1
function chuli(){ 
    if(xmlHttpRequest.readyState==4){
     STATE=false; 
     document.getElementById("txtHint").innerHTML=xmlHttpRequest.responseText;
     text=xmlHttpRequest.responseText;//�ж��ı������Ƿ�Ϊ�գ��Ӷ��ж��û����Ƿ����
     if(text.length!=3)// ��3���ɿյ�״̬  ��Ҳ��֪��Ϊʲô������ʲô������ʾ�����з��صĳ���
	  {
         IUA=0;//����Ϊ��ͨ��״̬
     }
     else
     {
         IUA=1; 
     }
    }
}    
//�ص�����  2
function chuli2(){ 
    if(xmlHttpRequest.readyState==4){
     STATE=false;    
     document.getElementById("txtHint2").innerHTML=xmlHttpRequest.responseText;
     text=xmlHttpRequest.responseText;//�ж��ı������Ƿ�Ϊ�գ��Ӷ��ж��û����Ƿ����
     if(text.length!=3)// ��3���ɿյ�״̬  ��Ҳ��֪��Ϊʲô������ʲô������ʾ�����з��صĳ���
	 {
         IEA=0;//����Ϊ��ͨ��״̬
         //alert(IUA);
     }
     else
     {
         IEA=1; 
     }
    }
}    

   



function $(id){  
    return document.getElementById(id);  //�������Ƽ������ ���Ǹ���id���ض�Ӧ��Ԫ��
 } 

 
function formCheck(){
    var pwd1 = document.getElementById("pass").value;    //������������
    var pwd2 = document.getElementById("pass2").value;   //����ٴ����������
    var Email = document.getElementById("email").value;  //���Email
    var isRight = chkEmail(Email);                       //���������ʽ�Ƿ�ϸ�
    var isUsernameAvailable =IUA;                          //����û����Ƿ����
    var isEmailAvailable = IEA;                             //��������Ƿ��Ѿ���ע���
                        
     if(isUsernameAvailable==0){
         alert("�û����Ѿ���ע�ᣡ ");
         return false;
     }
     else if(isEmailAvailable==0){
         alert("�����Ѿ���ע�����");
         return false;
     }
     else if(pwd1!=pwd2){                                   
         alert("�����������벻һ�£�");
         return false;
     }
     else if(!isRight){
         alert("�����ʽ����ȷ��");
         return false;
     }
     return true;      
 }
 
 function chkEmail(strEmail) //ʹ��������ʽ�ж������ʽ�Ƿ�Ϸ�
 {
 	if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(strEmail)){
 	return false;
 	}
 	else {
 	return true;
 	}
 } 	
 
</script>  
</head>  
<body>  
   <form id="reg" action="register.php" method="post" onsubmit= "return formCheck() ">
  <p>User Name�� <input type="text" onblur="checkName(1)" required="required"  class="input" name="username" id="user"> </p>
  <div  id="txtHint" style="color:red;"><b ></b></div>    
<!--     ������ʾ�Ƿ��Ѿ�ע�����Ϣ -->
  
  <p>E-Mail: <input type="text" onblur="checkName(2)" required="required" class="input" name="email" id="email"></p>
   <div  id="txtHint2" style="color:red;"><b ></b></div>
 <!--     ������ʾ�Ƿ��Ѿ�ע�����Ϣ -->
   
  <p>Password�� <input  type="password" required="required" class="input" name="password" id="pass"></p>
  <p>Confirm Password�� <input  type="password" required="required" class="input" name="password" id="pass2"></p>
  
  
   
  <p><input id="checkemail" type="submit" class="but" value="�ύע��"></p>
 </form> 
 
</body>  
</html>







    
