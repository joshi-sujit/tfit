<?php
class Idgenerator extends CI_Model{
    
    //Declaring function to generate new id
    public function genId($tbl_name,$key)
	{
		$primary_key = $key;
		$name = substr($tbl_name,4,3);
		$query = $this->db->query("SELECT $key as id FROM $tbl_name");
		
		$queryCount = $query->num_rows();
		$sn = 0;
		foreach ($query->result() as $rec)
		{
			$oldid = $rec->id;
			$value = substr($oldid,4);
			
			if($sn<$queryCount){
				$result[$sn] = $value;
				$sn++;
			}
		}
		
		if(!isset($oldid))
		{
			$nwid= $name.'_1';
		}	
			else
			{
				$max = max($result);
				$nwid=$max+1;
				$nwid = $name.'_'.$nwid;
			}	
			return $nwid;
	}
}
?>