## 目录结构 Menu Structure

~~~
hyper-terminator          黑客马拉松作品 Works in Hackathon 2017
│
├─0_chaincode             Go语言写的智能合约
│  └─demo.go              三方智能机器达成共识的简单演示
│
├─1_bluemix               与chaincode交互部分 interaction with chaincode use PHP
│  ├─0regist.php          用户注册 user registrar
│  ├─1init.php            部署链码及初始化 deploy chaincode & init value
│  ├─2write.php           写入3个值 write 3 values into hyperledger
│  ├─3read.php            读取1个值 read 1 value that consensus on the 3 values inputed before
│  ├─httpful.phar         一个开源的REST调用工具 an opensource REST API tool
│  └─readme.md            所用链相关信息等说明 some info about chain nodes and user on bluemix's hyperledger 
│
├─2_interface             用php+mysql写的简单交互界面 simply interaction web surface used php+mysql
│  ├─runjus.sql           Mysql数据库结构 mysql structure
│  ├─darknet              用于与darknet-yolo交互的界面
│  │  ├─index.php         任务列表 list of task
│  │  ├─tolist.php        添加任务 add task
│  │  ├─view.php          查看任务 view a task
│  │  ├─x.php             列表页无刷新扩展 extend of list
│  │  └──okpic            存储图片文件的目录 the directory of local image file
│  │     └─yasuopic.php   压缩上传图片的库 the library for compress upload images
│  ├─seqToseq             用于与Paddle-seqToseq交互的界面
│  │  ├─index.php         任务列表 list of task
│  │  ├─tolist.php        添加任务 add task
│  │  ├─view.php          查看任务 view a task
│  │  └─x.php             列表页无刷新扩展 extend of list
│  └─readme.md            前端UI相关说明 some library used introduction
│
├─3_intelligence           人工智能部分 part of the artificial intelligence
│  ├─darknet               运行darknet-yolo的原创代码 Our original code with Darknet-Yolo
│  │  ├─run.php            定时运行darknet的脚本 Script for tasks run include IPFS and Hyperledger
│  │  ├─loop.sh            定期运行脚本的逻辑 logic for excute the php script
│  │  ├──data              存储图片文件的目录 the directory of local image file
│  │  │  ├─voc.names       识别物体的中英文名称 the names of detected objects also in English and Chinese
│  │  │  └─labels.zip      用于标注物体名称的图片压缩包 the zip of image files for tag objects 
│  │  ├─readme.md          如何在Darknet-Yolo基础上使用这些代码的说明 How to use these code based on Darknet-Yolo
│  └─seqToseq              用于与Paddle-seqToseq交互的界面
│     ├─run.php            定时运行Paddle运算的脚本 Script for tasks run Paddle with IPFS and Hyperledger
│     ├─src.dict           法律事实部分的语料词典 the dictionary of legal fact corpus
│     ├─trg.dict           定罪量刑部分的语料词典 the dictionary of judgment corpus 
│     ├─model_pass158.zip  经过160次迭代生成的Pass文件中正确率最高的模型打包 zip of the pass files that after 160 iteration
│     ├─jus12w.zip         来自12万份一审刑事判决书的语料 zip of corpus from 120 thousand first instance criminal judgment
│     └─readme.md          关于如何运行这些文件的说明 how to use these code with Paddle
│
├─architecture.md          项目架构介绍 Introduction of architecture
├─environment.md           作品运行环境介绍 Introduction of running environment
├─intro.md                 纯文字作品介绍 Introduction of this work in txt
└─intro.pptx               作品介绍PPT文件 Introduction PPT of this work
~~~
  
## 技术与工具 Technology&Tools

* IBM Hyperledger (Bluemix)
* IPFS
* PaddlePaddle
* Darknet
* Apache+PHP+Mysql
* Python2.7 
* ……
