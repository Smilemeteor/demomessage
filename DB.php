<?php 
class DB
{ 
         public function pdo()
        {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', 'root');
                return $pdo();
        }
	public function add()  
	{
        //insert into $table_name (姓名,性别,出生日期) values ('开心朋朋','男','1980/6/15')

		$sql = 'insert into '.$table_name;
		$filed = '(';
		$value = ' values (';
		foreach ($params as $key => $value) {
			$filed .=$key.',';
			$value .=$key.',';
		}
		$sql .= trim($filed, ',').')'.trim($value,',').')';
		return $pdo->exec($sql);
	}
        public function show()
        {
                $sql = 'select * from '.$table_name;
                return $pdo->exec($sql);
        }
        public function delete()
        {
                
        }
}
