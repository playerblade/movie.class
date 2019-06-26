<?php

namespace Category;

class Controller
{
    protected $category;

    function __construct()
    {
        $this->category = new Category();
    }
    function index()
    {
        $data = $this->category->all();
        view(__DIR__ . "/views/index.php", ['data' => $data]);
    }

    function show($id)
    {
        $category = $this->category->get($id);
        view(__DIR__ . "/views/show.php", ['category' => $category]);
    }

    function create()
    {
        $data = ['action' => \Route::link("/category/store")];
        view(__DIR__ . "/views/form.php", $data);
    }

    function store($data)
    {
        $this->category->store($data);
        redirect(\Route::link('/category'));
    }

    function edit($id)
    {
        $data = [
            'action' => \Route::link("/category/{$id}/update"),
            'category' => $this->category->get($id)
        ];
        view(__DIR__ . "/views/form.php", $data);

    }

    function update($id, $data)
    {
        $this->category->update($id, $data);
        redirect(\Route::link('/category'));
    }

    function delete($id)
    {
        $this->category->delete($id);
        redirect(\Route::link('/category'));
    }
}
