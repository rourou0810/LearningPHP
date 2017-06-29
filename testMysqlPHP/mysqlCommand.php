<?php  

	//--------------------操作mysql常用语句--------------------------------

	//查询数据库
	show databases;

	//选择数据库
	use databasename;

	//查看选择的数据库中有哪些表
	show tables;

	//创建表--创建类别数据表categories

	drop table if exists categories;
	create table categories(
		categoryId samllint(4) unsigend not null auto_increment, //图书类别ID
		pid samllint(4) unsigend not null default '0',	         //图书类别的父ID
		categoryName varchar(15) not null unique,		 //图书类别名称
		categoryDesn text not null,				 //图书类别描述
		primary key (categoryId)				 //设置类别ID为主键
	)TYPE=MyISAM;//设置表类型为MyISAM


	//查看表头有哪些字段
	desc tablename;

	//插入表数据--insert into 表名(, , ,) values(, , ,);
	insert into categories(pid,categoryName,categoryDesn) values(0,'英语类','存放和英语相关的图书');

	//更新数据--update 表名 set 字段名=表达式,字段名=表达式 where 条件;
	update books set categoryId=1,bookname='Linux',author='高某',price=50.00 where bookId=3;

	//删除表数据--delete from 表名 where 条件;
	delete from books where bookId=2;
	delete from books; //删除表内所有数据

	//查询表内数据
	select * from books;//查询所有数据
	select bookname,author,price from books;

	//检索出计算机类别（类别ID为1）的图书，并且价格在50元以下的图书
	select bookname,price from books where categoryId=1 and price<=50;

	//查找图书介绍不为空的所有图书信息
	select * from books where detail is not null;

	//查找图书价格在30.00元到80.00元之间的所有图书
	select bookname,price from books where price between 30.00 and 80.00;
	select bookname,price from books where price>=30.00 and price<=80.00;

	//查找图书价格在40.00元以下和60.00元以上的所有图书
	select bookname,price from books where price not between 40.00 and 60.00;


	//----------------------------------------------------------------------
	//使用like进行模糊查询
	//"%"：表示0个或任意多个字符
	//"_"：表示单个的任意一个字符

	//查找图书名称中包含PHP字符串的所有图书
	select bookname,author,price from books where bookname like '%PHP%';

	//查找图书名称中不包含PHP字符串的所有图书
	select bookname,author,price from books where bookname not like '%PHP%';

	//查找作者叫“高x某”的人
	select bookname,author,price from books where author like '高_某';

	//精确查询
	select bookname,author,price from books where author='高某某';

	//-----------------------------多表查询-----------------------------------

	//图书类别表-catefories,图书信息表-books
	select c.categoryName'图书类别',b.bookname'书名',b.price'价格' from categories c,books b;
	where c.categoryId=b.categoryId;





?>
