文档
====

## 后台管理

例如已经完成的**登陆** 

### 1.登陆

	methor: POST
	action: login.php
	data:
		uname 
		pwd
		action = login

	result:
		成功:index.php
		失败:login.php


### 2.登出

	methor: POST
	action: logout.php
	data:
		action = logout

	result:
		成功:login.php
		失败:login.php

### 3.添加菜

	methor: POST
	action: add.php
	data:
		name, price, category, upload_file, content
		// category 为数字 1,2,3,4 分别对应四个类别 chinese western fruit dessert
		action = add

	result:
		成功: $log = 1
		失败: $log = 0

### 4.修改

	methor: POST
	action: change.php
	data:
		id, name, price, category, pic, content
		// category 为数字 1,2,3,4 分别对应四个类别
		action = edit

	result:
		成功: $log = 1
		失败: $log = 0

### 5.删除菜

	$foods = array(id, name)

	methor: POST
	action: delete.php
	data:
		id = 1|2|3   // 用'|'分隔
		category = 1 // category 为数字 1,2,3,4 分别对应四个类别
		action = delete

	result:
		成功: $log = 1
		失败: $log = 0

### 6.查看所有菜

	methor: GET
	action: food.php
	data:
		// 默认全部输出
		num  // 每页数
		page // 页号


	result:
		成功: $foods = array()
		失败: 

### 7.管理订单

	$orders = array("oid", "uid", "fids", "time", "price", "ano", "pno", "status" )
	// fids = array( [1] = {1|2|3} , [2] = {}, [3] = {}, [4] = {} )
	// status: 1.下单 2.运送 3.接收	

	methor: GET
	action: order_manage.php
	data:
		// 默认全部输出
		num  // 每页数
		page // 页号

	result:
		成功: $orders = array("oid", "uid", "fids", "time", "price", "ano", "pno", "status" )
		失败: 

### 8.管理用户

	$users = array("uid", "openid", "anos"=array(), "pnos"=array() )

	methor: GET
	action: food.php
	data:
		// 默认全部输出
		num  // 每页数
		page // 页号

	result:
		成功: $users = array("uid", "openid", "anos"=array(), "pnos"=array() )
		失败: 

### 7.设置菜
#### 1) 得到菜单

	methor: POST
	action: today_menu.php
	data:
		category

	result:
		成功: $foods = array()
		失败: 

#### 2) 设置推荐菜

	methor: POST
	action: today_menu.php
	data:
		id = 1|2|3

	result:
		成功: $log = 1
		失败: $log = 0


## 微信点菜
### 1.查看今日菜单

	food = array("id", "name", "price", "pic", "content", "recommond")
	methor: GET
	action: today.php
	data:
		// category 为数字 1,2,3,4 分别对应四个类别
		category

	result:
		成功: $log = 1
		失败: $log = 0


### 2.点单

	$addresses = array(ano, address )
	$phones = array(pno, phone)

	methor: POST
	action: order.php

	data:
	
		chinese = 1|2
		western = 2|3
		fruit = 1|4
		dessert = 1|1
		address or ano  // 如为新address，先insert，再取出ano
		phone or pno	// 如为新phone，先insert，再取出pno

	result:
		成功: $log = 1
		失败: $log = 0



