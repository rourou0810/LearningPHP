<!DOCTYPE html>
<html>
<head>
	<title><?php echo "PHP标记语言的使用" ?></title>
</head>
<body>

	<?php 
		/*变量：声明变量用$
			1.unset():销毁变量；
			2.isset():检测变量是否设置
			3.empty():检查一个变量是否为空
		*/

		$var = '';
		if(empty($var)){	//结果为true,因为 $var 为空
			echo '$var is either 0 or not set at all';
		}

		if(!isset($var)){	//结果为false,因为 $var 已设置
			echo '$var is not set at all';
		}

		unset($var);		//销毁单个变量 $var

		if(isset($var)){	//结果为false,因为 $var 已销毁
			print 'this var is set so i will print';
		}
	 ?>

<!-- --------------------------------------------可变变量------------------------------------------------------------- -->

	 <hr>
	 <h4>可变变量</h4>
	 <?php 
	 	/*可变变量：*/

		$hi = 'hello';
		$$hi = 'world';		//声明一个可变变量 $$hi ,$hi 的值是hello,相当于声明$hello的值是world;

		echo "$hi $hello";	//如果要输出变量，必须用双引号
		echo "$hi ${$hi}";
	 ?>

<!-- --------------------------------------------变量的引用赋值----------------------------------------------------------- -->

	 <hr>
	 <h4>变量的引用赋值</h4>
	 <?php 
	 	/*变量的引用赋值：
			1.只要其中的任何一个变量有所改变，都会影响到另一个变量。
			2.只有有名字的变量才可以引用赋值。
	 	*/

	 	$foo = 'Bob';
	 	$bar = &$foo;	//将变量$foo的引用赋值给变量$bar

	 	$bar = 'my name is Tom';
	 	echo $bar;
	 	echo $foo;

	 	$foo = 'my name is Bob';
	 	echo $bar;
	 	echo $foo;

	 	$foo = 25;
	 	$bar = &$foo;		//有效引用
	 	//$bar = $(24*7);		//无效引用，不引用将表达式作为引用赋值

	 	function test(){
	 		return 25;
	 	}
	 	//$bar = &$test();	//无效引用
	 ?>

<!-- ----------------------------------------变量的类型----------------------------------------------------------------- -->

	 <hr>
	 <h4>变量的类型</h4>
	 <?php 
	 	/*变量的类型--8种：
			四种标量类型：boolean, interger, float, string;
			两种复合类型：array, object;
			两种特殊类型：resource（资源）, NULL。

			var_dump():查看某个表达式的值和类型。
	 	*/

		$bool = true;
		$str  = "foo";
		$int  = 12;

		var_dump($bool);
		var_dump($str);
		var_dump($int);

		/*
			布尔型（boolean）:
			以下值被认为是false,其他值被认为是true:
			1.布尔值false;
			2.整型值0为假，-1和其他非零值（不论正负）一样，被认为是true;
			3.浮点型值0.0；
			4.空白字符串和字符串“0”;
			5.没有成员变量的数组;
			6.没有单元的对象;
			7.特殊类型NULL（包括尚未设定的变量）。
		*/
		var_dump((bool) array()); 	//false
		var_dump((bool) -2);		//true

		/*
			整型（integer）:
			最大值：2,147,483,647
			最小值：-2,147,483,647

			超出最大值或者最小值（整型溢出）：会返回float
		*/
		$large_num = 2147483648;
		var_dump($large_num);

		// $beer = 'hello';
		// echo "$beer's state";
		// echo "$beers state";
		// echo "${beer}s state";
		// echo "{$beer}s state";
	 ?>

<!-- ------------------------------------------定界符--------------------------------------------------------------- -->

	 <hr>
	 <h4>定界符</h4>
	 <?php 
	 	/*定界符：
			定义较长的字符串，通常用于从文件或者数据库中大段的输出文档；
			定界符中的变量也会被解析。
			在定界符中可以使用任意转义字符，直接使用双引号以及解析其中的变量。
			
	 	*/

		$name = 'ShangHai';

		$strings = <<<EOT
					My name is $name.I am printing a "String" \n.
					\tNow,I am some new line \n\r.fhdjfhsjfkshfkj.
EOT;
//注意这里：结束标识符必须从行的第一列开始，不能包含任何字符，空格以及空白制表符等等。

		echo $strings;
	 ?>

<!-- ------------------------------------------数 组--------------------------------------------------------------- -->
	<hr>
	<h4>数组（Array）</h4>
	<?php 
		$arr = array("foo" => "bar", 12 => true);

		print_r($arr);	//print_r()查看数组的全部内容
		echo $arr["foo"];
		echo $arr[12];
	?>

<!-- ------------------------------------------对 象--------------------------------------------------------------- -->

	<hr>
	<h4>对象（Object）</h4>
	<?php 
		
		class Person {	//定义一个类
			var $name;		//定义属性

			function say() {	//定义方法
				echo "Doing foo.";
			}
		}

		$p = new Person;	//实例化类

		$p->name = "Tom";	//访问成员属性
		$p->say();			//访问成员方法
		
	?>

<!-- ------------------------------------------NULL类型----------------------------------------------------- -->

	<hr>
	<h4>NULL类型</h4>
	<?php 
		
		/*变量被认为是NULL的情况：
			1.将变量直接赋值为NULL;
			2.声明的变量尚未被赋值;
			3.被unset()函数销毁的变量。
		*/

		$a = NULL;
		$b = "value";
		unset($b);

		var_dump($a);
		var_dump($b);
		var_dump($c);		
	?>
<!-- ------------------------------------------常 量----------------------------------------------------- -->

	<hr>
	<h4>常 量</h4>
	<?php 
		
		/*常量：
			常量前没有$;
			常量只能用define()定义，一旦定义不能被重新定义或者取消定义。
		*/

		define("CON_INT", 100);
		define("FLO", 99.99);
		define("BOO", true);
		define("CONSTANT", "Hello world.");
		echo CONSTANT;
		//echo Constant;	报错了，区分大小写

		//使用第三个参数传入true值，常量将会定义成不区分大小写
		define("GREETING", "Hello you.", true);
		echo GREETING;
		echo Greeting;

		//使用defined()函数，检查常量CONSTANT是否存在，如果存在则输出常量的值。
		if(defined("CONSTANT")){
			echo CONSTANT;
		}
		
	?>
</body>
</html>
