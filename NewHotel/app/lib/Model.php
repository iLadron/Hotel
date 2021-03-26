<?php


class Model{
    public function __construct(){
        $this->db=new Database;
    }



    public function getById($id, $table, $select = "*"){
        if( is_array($select)){
            $select = implode(", ", $select);
        }


                
        $sth = $this->db->prepare("SELECT ".$select." FROM ".$table." WHERE id = :id LIMIT 1" );
        $sth->execute(array(":id"=>$id));

        if ($sth->rowCount() > 0 ){
            return $sth->fetchAll(PDO::FETCH_ASSOC)[0];
        }else{
            return false;
        }


    }


    public function getList($table, $order = "id asc", $select = "*", $filter = " 1=1"){

        if( is_array($select)){
            $select = implode(", ", $select);
        }

        $sth = $this->db->prepare("SELECT ".$select." FROM ".$table." WHERE ".$filter." ORDER BY ".$order );
        $sth->execute(array());

        if ($sth->rowCount() > 0 ){
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }


    public function del($table, $attr, $value){
        $sth = $this->db->prepare("DELETE FROM ".$table." WHERE ".$attr." = ".$value );
        $sth->execute(array());

        if ($sth->rowCount() > 0 ){
            return true;
        }else{
            return false;
        }
    }
    
}