# pikachu

Pikachu是一个带有漏洞的Web应用系统，在这里包含了常见的web安全漏洞。 如果你是一个Web渗透测试学习人员且正发愁没有合适的靶场进行练习，那么Pikachu可能正合你意。

Pikachu上的漏洞类型列表如下：

Burt Force(暴力破解漏洞)
XSS(跨站脚本漏洞)
CSRF(跨站请求伪造)
SQL-Inject(SQL注入漏洞)

RCE(远程命令/代码执行)
Files Inclusion(文件包含漏洞)
Unsafe file downloads(不安全的文件下载)
Unsafe file uploads(不安全的文件上传)
Over Permisson(越权漏洞)
../../../(目录遍历)
I can see your ABC(敏感信息泄露)
PHP反序列化漏洞
XXE(XML External Entity attack)
不安全的URL重定向
SSRF(Server-Side Request Forgery)
More...(找找看?..有彩蛋!)

管理工具里面提供了一个简易的xss管理后台,供你测试钓鱼和捞cookie~
后续会持续更新一些新的漏洞进来,也欢迎你提交漏洞案例给我,最新版本请关注pikachu
每类漏洞根据不同的情况又分别设计了不同的子类
同时,为了让这些漏洞变的有意思一些,在Pikachu平台上为每个漏洞都设计了一些小的场景,点击漏洞页面右上角的"提示"可以查看到帮助信息。


如何安装和使用
Pikachu使用世界上最好的语言PHP进行开发-_-，数据库使用的是mysql，因此运行Pikachu你需要提前安装好"PHP+MYSQL+中间件（如apache,nginx等）"的基础环境，建议在你的测试环境直接使用 一些集成软件来搭建这些基础环境,比如XAMPP,WAMP等,作为一个搞安全的人,这些东西对你来说应该不是什么难事。接下来:
-->把下载下来的pikachu文件夹放到web服务器根目录下;
-->根据实际情况修改inc/config.inc.php里面的数据库连接配置;
-->访问http://x.x.x.x/pikachu,会有一个红色的热情提示"欢迎使用,pikachu还没有初始化，点击进行初始化安装!",点击即可完成安装。


我为Pikachu创建了一个QQ群(ID:532078894)，欢迎加进来和大家一起学习讨论。
如果阁下对Pikachu有什么建议或者想找我聊聊可以发个邮件给我：1061321987@qq.com。谢谢。

切记
"少就是多,慢就是快"
