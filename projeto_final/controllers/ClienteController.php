<?php

require_once "../../models/ClienteModel.php";

class ClienteController {

    private $model;

    function __construct()
    {
        $this->model = new ClienteModel();
    }

    public function read() {
        return $this->model->read();
    }

    public function add(Cliente $c) {
        return $this->model->create($c);
    }

    public function edit(Cliente $c) {
        return $this->model->update($c);
    }

    public function findId($id) {
        return $this->model->findId($id);
    }

    public function remove($id) {
        return $this->model->delete($id);
    }

}