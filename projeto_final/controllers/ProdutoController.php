<?php

require_once "../../models/ProdutoModel.php";

class ProdutoController {

    private $model;

    function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function read() {
        return $this->model->read();
    }

    public function add(Produto $c) {
        return $this->model->create($c);
    }

    public function edit(Produto $c) {
        return $this->model->update($c);
    }

    public function findId($id) {
        return $this->model->findId($id);
    }

    public function remove($id) {
        return $this->model->delete($id);
    }

}