<?php

namespace Category;

class Category
{
    protected $db;

    function __construct()
    {
        $this->db = getConnectionDB();
    }

    function all()
    {
        $sql = "SELECT * FROM category WHERE deleted_at IS NULL";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $data =  $stm->fetchAll();
    }

    function get($id)
    {
        $sql = "SELECT * FROM category WHERE id = :id AND deleted_at IS NULL";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $data = $stm->fetchAll();

        if (!empty($data[0]))
            return $data[0];
        else
            throw new \Exception("No data");
    }

    function store($data)
    {
        $sql = "INSERT INTO category(name) VALUES (:name)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":name", $data['name']);
        $stm->execute();
    }

    function update($id, $data, $nullOveride = false)
    {
        $sql = "UPDATE category SET name=:name WHERE id=:id";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":name", $data['name']);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }

    function delete($id)
    {
        $sql = "UPDATE category SET deleted_at=NOW() WHERE id=:id";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }
}
