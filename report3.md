1，新建了一个容器，运行的是nginx服务，服务可以运行
在容器内部，可以curl成功
root@4e797f3f6349:/# curl 127.0.0.1
<!DOCTYPE html>
<html>
<head>
<title>Welcome to nginx!</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<body>
<h1>Welcome to nginx!</h1>
<p>If you see this page, the nginx web server is successfully installed and
working. Further configuration is required.</p>

<p>For online documentation and support please refer to
<a href="http://nginx.org/">nginx.org</a>.<br/>
Commercial support is available at
<a href="http://nginx.com/">nginx.com</a>.</p>

<p><em>Thank you for using nginx.</em></p>
</body>
</html>

2，把容器的80端口映射到宿主机的10123端口，在服务端上curl是成功的
$ curl 127.0.0.1:10123
<!DOCTYPE html>
<html>
<head>
<title>Welcome to nginx!</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<body>
<h1>Welcome to nginx!</h1>
<p>If you see this page, the nginx web server is successfully installed and
working. Further configuration is required.</p>

<p>For online documentation and support please refer to
<a href="http://nginx.org/">nginx.org</a>.<br/>
Commercial support is available at
<a href="http://nginx.com/">nginx.com</a>.</p>

<p><em>Thank you for using nginx.</em></p>
</body>
</html>

3，在客户端上curl失败：
[user@192 LearnWebsite]$ curl 140.143.197.165:10123
curl: (7) Failed connect to 140.143.197.165:10123; Connection refused


4，实在没办法，换了个端口映射，就可以了
2fa087fc0cc3        foo/live:latest       "/run.sh"                6 minutes ago       Up 5 minutes                0.0.0.0:32784->22/tcp, 0.0.0.0:32783->80/tcp   hungry_cori
通过140.143.197.165:32783可以看到nginx欢迎页面

5,修改以下/etc/nginx/sites-enabled/default文件，把root那行改成root /data
/data目录下放了我之前做的抽奖网页，最后浏览器访问140.143.197.165:32783，可以访问到，但是不能加载js。。。

接下来， 研究一下怎么加载js，貌似要改nginx 的配置文件
	打算在容器里安装以下apache
	以及学习一下markdown语法
	学习容器之间的通信
