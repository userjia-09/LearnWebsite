遇到的问题：
1,已经在服务器上创建了容器，镜像是ubuntu:latest但是还没有映射端口号
2，映射端口号命令是sudo docker run -d -p 127.0.0.1:5000:5000 [images] [cmd],结果都没成功
3，后来尝试要运行nginx服务，已经写好Dockerfile,run.sh等文件，结果要创建镜像时，docker build命令有报错：pull access denied for sshd, repository does not exist or may require 'docker login'
4，3的问题解决了，是因为我照着书上的写，然而我本地并没有那个镜像，所以dockerfile第一句改成了FROM ubuntu:latest，就可以了
5，然而又出现另一个错误： ---> Running in 1f8c89b892e8
Reading package lists...
Building dependency tree...
Reading state information...
E: Unable to locate package nginx
我以为是nginx不能下载，然后改成apache，结果是一样的报错

 ---> Running in 35d105d837b2
Reading package lists...
Building dependency tree...
Reading state information...
E: Unable to locate package apache2
6,最后解决了，把一开始继承的镜像改成ubuntu:LearnBackend
7,测试阶段：用curl抓取网页测试sample站点，有报错：curl: (56) Recv failure: Connection reset by peer
8,最后创建容器并分配端口，发现只能维持几秒，下一秒容器就自动关了，好奇怪。。

接下来：还是把项目部署到服务器上
研究以下容器之间怎么通信
