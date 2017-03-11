## 目录结构

初始的目录结构如下：

~~~
hyper terminiater WEB部署目录（或者子目录）
├─chaincode             一个go写的智能合约代码
│  └─common             公共模块目录（可以更改）
│
├─bluemix               与chaincode交互的部分
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─UI （php+mysql）       逻辑和前端运转 
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─AI
│  ├─darknet             语言文件目录
│  └─seqToseq            框架类库目录
│     ├─model           Think类库包目录
│     └─data                扩展类库目录
│
└─README.md             README 文件
~~~

> paddle
> darknet-yolo
> corntab
> screen
  
## 命名规范

ThinkPHP5的命名规范遵循PSR-2规范以及PSR-4自动加载规范。