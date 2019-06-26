<?php
namespace Person;

class Person
{
    protected $db;

    function __construct()
    {
        $this->db = getConnectionDB();
    }
     public static function all()
    {
        $db = getConnectionDB();
        $sql = "SELECT p.* , c.country_name
                FROM person  p LEFT JOIN country c ON p.id = c.id 
                WHERE p.deleted_at IS NULL ";
        $stm = $db->prepare($sql);
        $stm->execute();
        $persons = $stm->fetchAll();
        foreach ($persons as &$person)
        {
            $person['gender_name'] = Gender::getName($person['gender']);
        }
        return $persons;
    }
    public static function get($id)
    {
        $db = getConnectionDB();
        $sql = "SELECT p.*,c.country_name
        FROM person AS p 
        LEFT JOIN  country AS c
        ON c.id = p.country_id
        WHERE p.id = :id
        AND p.deleted_at IS NULL";

        $stm = $db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $data = $stm->fetch();

        $data['gender_name'] = Gender::getName($data['gender']);/// VERY IMPORTANT
        return $data;

    }
    public static function add($data)
    {
        $db = getConnectionDB();
        $sql = "INSERT INTO person(name,lastname,age,gender,country_id,description)
                VALUES (:name,:lastname,:age,:gender,:country_id,:description);";
        // depues agredamos country  //,:gender,:description //,age,gender,description
//        dd($data);
        $stm = $db->prepare($sql);
        $stm->bindParam(":name",$data['name']);
        $stm->bindParam(":lastname",$data['lastname']);
        $stm->bindParam(":age",$data['age']);
        $stm->bindParam(":gender",$data['gender']);
        $stm->bindParam(":country_id",$data['country_id']);
        $stm->bindParam(":description",$data['description']);
        $stm->execute();

        return $db->lastInsertId();
    }
    public static function update($id, $data, $nullOveride = false)
    {
        $db = getConnectionDB();
        $sql = "UPDATE person SET name=:name , lastname = :lastname , age = :age , gender = :gender ,country_id=:country_id, description = :description 
                WHERE id=:id";
        $stm = $db->prepare($sql);
        $stm->bindParam(":name", $data['name']);
        $stm->bindParam(":lastname" , $data['lastname']);
        $stm->bindParam(":age",$data['age']);
        $stm->bindParam(":gender",$data['gender']);
        $stm->bindParam(":country_id",$data['country_id']);
        $stm->bindParam(":description",$data['description']);

        $stm->bindParam(":id", $id);
        $stm->execute();
    }
//
    public static function delete($id)
    {
        $db = getConnectionDB();
//        eliminamos de la otra forma
//        $sql = "UPDATE country SET deleted_at=NOW() WHERE id=:id";
        $sql ="UPDATE person SET deleted_at=NOW() IS NULL 
               WHERE id = :id;";
        $stm = $db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }
}