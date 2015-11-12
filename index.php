
<?php
require_once __DIR__ .'/fluent/FluentPDO.php';

try{
$dbh= new PDO ('mysql:host=127.0.0.1 ;dbname=DB','root','root',
	[PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',]);



//var_dump($dbh);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
// режим ошибок.выброс исключений
//echo 'привет';
$sth = $dbh->prepare('SELECT * FROM images  ');
$sth->execute();
$result = $sth->fetchAll(
	PDO::FETCH_ASSOC  );
//var_dump($result);
} catch (PDOException $e){
	echo $e->getMessage(); 
}

foreach ($result as $key=>$value ){
	echo $value['title'];
	echo '<br>';
	echo $value['content'];
}
echo'</br>' ;
//echo is_object ( $result ) ? 'обьект' : 'Не обьект'; ;

 // подключение к библиотеке!
 
$fpdo= new FluentPDO($dbh);
 $query=$fpdo->from('images');



foreach ($query as $key=>$value ){
	echo $key .':' .$value['title'];
	echo '<br>';
	echo $value['content'];
}
	



