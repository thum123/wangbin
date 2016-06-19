<?php
// var_dump($_SERVER);die;
$n=strpos($_SERVER['REQUEST_URI'],'y');//寻找位置
$url = substr($_SERVER['REQUEST_URI'],0,$n);

// echo $url1;die;
header('content-type:text/html;charset=utf-8');
error_reporting(0);
		$name = $data['name'] = $_POST['name'];
		$shujuku = $data['shujuku'] = $_POST['shujuku'];
		// echo $shujuku;die;
		$pass = $data['pass'] = $_POST['pass'];
		$ku_name = $data['ku_name'] = $_POST['ku_name'];
		$cn = mysql_connect("$data[shujuku]","$data[name]","$data[pass]");
		if(!$cn)
		{
			$url1 = 'http://'.$_SERVER['HTTP_HOST'].'/'.$url.'web/index.php?r=login/login';
				echo "<script>alert('数据库地址或用户名密码填写错误!')</script>";
				 header("refresh:0;url=$url1");die;
		}
		else
		{
			$url2 = 'http://'.$_SERVER['HTTP_HOST'].'/'.$url.'web/index.php?r=login/anzhuang';
			$url1 = 'http://'.$_SERVER['HTTP_HOST'].'/'.$url.'web/index.php?r=login/login';
				if($ku_name=='day133')
				{
						$str = "<?php
							return [
							    'class' => 'yii\db\Connection',
							    'dsn' => 'mysql:host=".$data['shujuku'].";dbname=".$data['ku_name']."',
							    'username' => '".$data['name']."',
							    'password' => '".$data['pass']."',
							    'charset' => 'utf8',
							];";
						$res = file_put_contents('./config/db.php', $str);
						if($res)
						{
							 header("refresh:0;url=$url2");die;
						}
						else
						{
							 header("refresh:0;url=$url1");die;
						}
				}
				else
				{
						echo "<script>alert('数据库填写错误!')</script>";
				 		header("refresh:0;url=$url1");die;
				}



		}

?>