<?php
namespace Country;

class Country
{
    protected $db;

    function __construct()
    {
        $this->db = getConnectionDB();
    }

    public static function all()
    {
        // retorna todos los paises en la base de datos
        $db = getConnectionDB();
        $sql = "SELECT * FROM country WHERE deleted_at IS NULL";
        $stm = $db->prepare($sql);
        $stm->execute();
        return $data =  $stm->fetchAll();
    }
//
    function get($id)
    {
        $sql = "SELECT * FROM country WHERE id = :id AND deleted_at IS NULL";

        $stm = $this->db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $data = $stm->fetchAll();

        if (!empty($data[0]))
            return $data[0];
        else
            throw new \Exception("No data");
    }
//
    function add($data)//puedes cambiar a add par ubicarse mejor
    {
        $sql = "INSERT INTO country(name) VALUES (:name)";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":name", $data['name']);
        $stm->execute();
        return $this->db->lastInsertId();
    }
//
    function update($id, $data, $nullOveride = false)
    {
        $sql = "UPDATE country SET name=:name WHERE id=:id";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":name", $data['name']);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }
//
    function delete($id)
    {
//        eliminamos de la otra forma
//        $sql = "UPDATE country SET deleted_at=NOW() WHERE id=:id";
        $sql ="DELETE FROM country WHERE id = :id;";
        $stm = $this->db->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }
    public  static function getAllForSelect($countryId =0){
        $countries = self::all();
        foreach ($countries as &$country){ 
            $country['selected']= $country['id'] == $countryId ? "selected" : "";
        }
        return $countries;
        // ele & es una variable como puntero
//            if ($country['id']=== $countryId){
//                $country['selected'] = 'selected';
//            }else{
//                $country['selected']="";
//            }
    }
}
