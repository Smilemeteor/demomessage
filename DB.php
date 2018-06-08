<?php 
class DB
{
    public function pdo()
        {
                $pdo = new PDO('mysql:host=127.0.0.1;dbname=test', 'root', 'root');
                return $pdo;
        }
	public function add($table_name,$parameters)
    {
        $sql = 'insert into '.$table_name;

        $filed = '(';
        $value = " values (";
        foreach ($parameters as $key => $val) {
            $filed .= $key.',';
            $value .= "'".$val."'".",";
         }

        $sql .= trim($filed, ',').')'.trim($value, ',').')';
 
        return $this->pdo()->exec($sql);

    }


    public function findAll($pdo,$table_name)
    {
        $sql = "select * from " . $table_name . "";

      $data=$pdo->query($sql)->fetchAll();
      $arr = array();
          foreach ($data as $key => $value) {
              $arr[$key]['user'] = $data[$key]['user'];
              $arr[$key]['title'] = $data[$key]['title'];
              $arr[$key]['content'] = $data[$key]['content'];
              $arr[$key]['id'] = $data[$key]['id'];
               $arr[$key]['date'] = $data[$key]['date'];
          }
          return $arr;
      
    }

    public function delete($pdo,$table_name,$where)
    {

       $sql="delete from ".$table_name."where='$where'";

       $res=$pdo->exec($sql);

       return $res;
    }


}