<?php

class insertmodel extends CI_Model
{

    public function insert($name, $email, $mobile, $image)
    {
        $sql = $this->db->query("INSERT INTO demo(name,email,mobile,image) values ('$name','$email','$mobile','$image')");
    }

    public function fetch()
    {
        $sql = $this->db->query("SELECT * FROM demo");
        return $sql->result();
    }

    
    public function deleterecord($id)
    {

        $this->db->where("id", $id);
        $this->db->delete("demo");

        //$this->db->query("delete from demo where id= $id");
        // print_r($r);exit;
        //return true;
    }


    public function edit($id)
    {
        $sql = $this->db->get_where('demo', array('id' => $id));
        return $sql->result();
    }
    public function update($name, $email, $mobile, $id, $image)
    {
        if($image != ""){
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'image' => $image
            );

        }
        else{
            $data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                 );
                 
        }
        
        $this->db->where('id', $id);
        $this->db->update('apitable', $data);
    }
}
