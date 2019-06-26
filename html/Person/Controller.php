<?php
namespace Person;

use Country\Country;

class Controller
{
    protected $person;

//    function __construct()
//    {
//        $this->person = new Person();
//    }
    function index($filter)
    {
//        $data = $this->person->all();
        $person = Person::all($filter);
        $params =[
            'data'=> $person /// prueba cambiando a person
        ];
        view("./Person/views/index.php", $params);//1

    }
//
    function create(){
//        $params = [
//            'action' => \Route::link("/person/store")//paso 2
//        ];
        $countries = Country::getAllForSelect();
        $genders = Gender::getAllForRadio();
        $params =[
            'countries' => $countries,
            'genders' => $genders,
            'action' => \Route::link("/person/store")//paso 2
        ];
        view("./Person/views/form.php", $params); // paso 1
//        dd($countries);

    }
    function store($data)
    {
        $personId = Person::add($data);

        redirect(\Route::link("/person/{$personId}"));
    }
    function show($id)
    {
        $person = Person::get($id);
            if (empty($person))
                die("404 Person no exit");
        $params =[
            'person' => $person
        ];
        view("./Person/views/show.php",$params);

//        view("./Person/views/index.php",$params);
    }
    ////
    function edit($id)
    {
        $person = Person::get($id);
        $countries = Country::getAllForSelect($person['country_id']);
        $genders = Gender::getAllForRadio($person['gender']);
        $params = [
            'person' => $person,
            'countries' => $countries,
            'genders' => $genders,
            'action' => \Route::link("/person/{$id}/update")
        ];
        view(__DIR__ . "/views/form.php", $params);// el controlador decide que regreser por ira siempre ahi

    }
////
    function update($id, $data)
    {
        Person::update($id,$data);
        redirect(\Route::link("/person/{$id}"));//paso 1
    }
//
    function delete($id)
    {
        Person::delete($id);
        redirect(\Route::link('/person'));//paso 1 // este \ = root --> porque no tiene namespace de Country
    }

}
