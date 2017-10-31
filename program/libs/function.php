<?php
class unit{
    function __construct()
    {
       $this->str='';
    }
    /*
     * cateTree(0,$mysql,'category',0)
     * $pid:父栏目
     * $db：数据库，用来获取数据
     * $table：表名
     * $flag：规定子栏目，用来指明是谁的子栏目
     * */
    function cateTree($pid,$db,$table,$flag){
        $sql = "select *from {$table} where pid={$pid}";
        $data = $db->query($sql);
        $flag++;
        while($row = $data->fetch_assoc()){
            $this->str .="
            <option value='{$row['cid']}'>$flag{$row['cname']}</option>
            ";
            $this->cateTree($row['cid'],$db,$table,$flag);
        }
        return $this->str;
    }
}