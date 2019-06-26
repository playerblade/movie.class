<?php

namespace Country;

class Controller
{
    protected $country;

    function __construct()
    {
        $this->country = new Country();
    }
    function index()
    {
        $data = $this->country->all(); // lista de paises
        view( "./Country/views/index.php", ['data' => $data]);//aqui traemos la lista de paises para ver pero lo traemos en array
    }

    function show($id)//para mostrar
    {
        $country = $this->country->get($id);//traemos
        view("./Country/views/show.php", ['country' => $country]);// mostramos
    }
//
    public function create()
    {
        $params = [
            'action' => \Route::link("/country/store")
        ];
        view("./Country/views/form.php", $params);//paso 1
    }
//
    function store($data)
    {
        $this->country->add($data);
        redirect(\Route::link('/country'));
    }
//
    function edit($id)
    {
        $params = [
            'action' => \Route::link("/country/{$id}/update"),//el update es de controlador porque lo controlatodo
            'country' => $this->country->get($id)
        ];
        view(__DIR__ . "/views/form.php", $params);// el controlador decide que regreser por ira siempre ahi

    }
//
    function update($id, $data)
    {
        $this->country->update($id, $data);//paso 2
        redirect(\Route::link('/country'));//paso 1
    }
//
    function delete($id)
    {
        $this->country->delete($id);//paso 2
        redirect(\Route::link('/country'));//paso 1 // este \ = root --> porque no tiene namespace de Country
    }
}
