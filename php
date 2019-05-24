##匿名函数
### 回调式匿名函数 
```<?php
function woziji($one,$two,$func)
{
       //我规定：检查$func是否是函数，如果不是函数停止执行本段代码，返回false
       if(!is_callable($func))
       {
               return false;
       }

       //我把$one、$two相加，再把$one和$two传入$func这个函数中处理一次
       //$func是一个变量函数，参见变量函数这一章
       echo $one + $two + $func($one,$two);

}

woziji(20,30,function( $foo , $bar)
{

               $result = ($foo+$bar)*2;
                echo $result,'<br/>';
               return $result;

}
);
?> 
``` 
* 内部函数 
``` 
<?php
function foo()
{
 echo '我是函数foo哟，调一下我才会执行定义函数bar的过程<br />';
 function bar()
 {
 echo '在foo函数内部有个函数叫bar函数<br />';
 }


}

//现在还不能调用bar()函数，因为它还不存在
bar();//删去后可运行

foo();

//现在可以调用bar()函数了，因为foo()函数的执行使得bar()函数变为已定义的函数

bar();

//再调一次foo()看看是不是会报错？
foo();

?> 
``` 

* 全局变量名	功能说明 
* $_COOKIE 	 得到会话控制中cookie传值
 
* $_SESSION	得到会话控制中session的值 
* $_FILES	得到文件上传的结果 

* $_GET	    得到get传值的结果 

* $_POST	     得到post传值的结果 

* $_REQUEST	即能得到get的传值结果，也能得到Post传值的结果 
* *** 
##全局变量 
　在 GLOBALS数组中，每一个变量为一个元素，键名对应变量名，值对应变量的内容。GLOBALS 之所以在全局范围内存在，是因为 GLOBALS是一个超全局变量。注意GLOBALS 的写法，比如变量a1,写法为GLOBALS['a1']。 
``` 
<?PHP
$a1 = 1;
$a2 = 2;
function Sum()
{
   $GLOBALS['a1'] = $GLOBALS['a1'] + $GLOBALS['a2']; //定义变量时每个都要定义
}
Sum();
echo $a1; //输出结果为2 
 
 
 
<?PHP 
$a=123; 
Global $a; //在函数体外把$a定义为global变量。 
function aa() 
{  
　　echo $a; 
} 
aa();//会报错，不能输出变量a。
?>  
 
 
 function test() 
{ 
    global $a;//定义全局变量a 
    unset($a); //删除变量a
    //print $a;//会报错，因为unset已经把$a删除了。 
} 
$a = 2; //定义一个变量a
test(); //调用test()方法
print $a; //输出a，输出的其实是$a = 2,所以结果为2. 
 
 
 
function test_global() 
{ 
    global $var1, $var2; 
    $var2 =& $var1; 
} 
function test_globals() 
{ 
    $GLOBALS['var3'] =& $GLOBALS['var1']; 
} 
$var1 = 5; 
$var2 = $var3 = 0; 

test_global(); 
print $var2; //输出结果为0

test_globals(); 
print $var3; //输结果为5 
 
 
  
<?php
function test_global()
{
global $var1;
global $var2;
$var2 =$var1;
}
function test_globals()
{
$GLOBALS['var3'] =& $GLOBALS['var1'];
}
$var1 = 5;
$var2 = $var3 = 0;
echo $var2,'<br/>'; //输出结果为0
test_global();
echo $var2,'<br/>';//输出结果为5
test_globals();
echo  $var3,'<br/>'; //输结果为5
``` 
*通过$GLOBLAS来读取外部变量 
``` 
<?php

$one = 10;

function demo()
{
   $two = 100;

   $result = $two + $GLOBALS['one'];

   return $result;

}
//你会发现结果变成了110
echo demo();

?> 
```
