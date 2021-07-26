<?php
include('conn.php');

class model
{
    function select($conn,$table)
    {
        $sel="select * from $table";
        $exe=$conn->query($sel);
        while($fetch=$exe->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }
    
    
    function select_join($conn,$table1,$table2,$where)
    {
        $sel="select * from $table1 join $table2 on $where ";
        $exe=$conn->query($sel);
        while($fetch=$exe->fetch_object())
        {
            $arr[]=$fetch;
        }
    
        return $arr;
        }
    
    
    function insert($conn,$table,$data)
    {
        $key=array_keys($data);
        $ikey=implode(",",$key);
        $value=array_values($data);
        $ivalue=implode("','",$value);
       $ins="insert into $table($ikey) values('$ivalue')";
        $exe=$conn->query($ins);
        return $exe;
    }
    
    
    function delete_where($conn,$table,$where)
    {
        $key=array_keys($where);
        $value=array_values($where);
        $del="delete from $table where 1=1";
        $i=0;
        foreach ($where as $w)
        {
            $del.=" and $key[$i]='$value[$i]'";
            $i++;
        }
        $exe=$conn->query($del);
        return $exe;
    }
    
    
    function select_where($conn,$table,$where)
    {
        $key=array_keys($where);
        $value=array_values($where);
        $sel="select * from $table where 1=1";
        $i=0;
        foreach($where as $w)
        {
            $sel.=" and $key[$i]='$value[$i]'";
            $i++;
        }
        $exe=$conn->query($sel);
        return $exe;
    }
    function update($conn,$tbl,$data,$where)
    {
        $key=array_keys($data);
        $value=array_values($data);
        $count=count($data);
        $upd="update $tbl set";
        $i=0;
        foreach ($data as $d)
        {
            if($count==$i+1)
            {
                $upd.= " $key[$i]='$value[$i]'";
            }
            else
            {
                $upd.= " $key[$i]='$value[$i]',";
            }
            $i++;
        }
      
        $upd.= " where 1=1 ";
        $keyw=array_keys($where);
        $valuew= array_values($where);
        $j=0;
        foreach($where as $w)
        {
            $upd.=" and $keyw[$j]='$valuew[$j]'";
            $j++;
        }
        $exe=$conn->query($upd);
        return $exe;
    }
}
?>
    
