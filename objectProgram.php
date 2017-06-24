<!DOCTYPE html>
<html>
<head>
	<title>PHP面向对象(OOP)</title>
</head>
<body>
	<p>面向对象(OOP)的优点：重用性、灵活性、扩展性。</p>

	<h3>类的实例化结果就是对象，而对象的抽象就是类。</h3>

	<div>类描述了一组有相同特性（属性）和相同行为（方法）的对象。</div>

<!-- ---------------------------------------对象的封装性--------------------------------------- -->

	<hr>
	<h3>对象的封装性</h3>
	<div>
		封装性就是把对象的成员属性和成员方法结合成一个独立的相同单位，并尽可能隐蔽对象的内部细节。
		封装的原则就是要求对象以外的部分不能随意存取对象的内部数据（成员属性和成员方法）。
	</div>

	<?php 
		//设置私有成员--private
		/**
		* 使用private对成员进行封装，封装后的成员在对象的外部不能被访问。
		*/
		class Person {
			//声明私有成员属性
			private $name;
			private $sex;
			private $age;

			//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值
			function _construct($name="", $sex="男", $age=1) {
				$this->name = $name;
				$this->sex  = $sex;
				$this->age  = $age;
			}

			//声明方法，调用两个内部的私有方法
			function run() {
				echo $this->name."在走路时".$this->leftLeg()."再".$this->rigthLeg()."<br>";
			}

			private function leftLeg() {
				return "迈左腿";
			}

			private function rigthLeg() {
				return "迈右腿";
			}
		}

		$person = new Person();	//实例化对象
		$person->run();			//在走路时迈左腿再迈右腿
		// $person->name = "李四";	//不能在对象的外部给私有属性赋值
		// echo $person->age;			//不能在对象的外部获取私有属性的值
		// $person->leftLeg();		//不能在对象的外部调用对象中私有的方法

		//--------私有成员的访问-public-------------------------------------------------
		class Person1 {
			//声明私有成员属性
			private $name;
			private $sex;
			private $age;

			//声明一个构造方法，将来创建对象时，为对象的成员属性赋予初值
			function __construct($name="", $sex="男", $age=1) {
				$this->name = $name;
				$this->sex  = $sex;
				$this->age  = $age;
			}

			public function getName() {
				return $this->name;
			}

			public function setSex($sex) {
				if($sex == "男" || $sex == "女") {
					$this->sex = $sex;
				}
			}

			public function setAge($age) {
				if($age >150 || $age <0) {
					return;
				}else {
					$this->age = $age;
				}
			}

			public function getAge() {
				if($this->age > 30){
					return $this->age-10;
				}else {
					return $this->age;
				}
			}

			function say() {
				echo "我的名字叫：".$this->name."，性别：".$this->sex."，年龄是：".$this->age."<br>";
			}
		}

		$person1 = new Person1("王五","男",40);	
		echo $person1->getName()."<br>";		//王五
		$person1->setSex("女");
		$person1->setAge(200);
		echo $person1->getAge()."<br>";			//30
		$person1->say();						//我的名字叫：王五，性别：女，年龄是：40


	?>
</body>
</html>