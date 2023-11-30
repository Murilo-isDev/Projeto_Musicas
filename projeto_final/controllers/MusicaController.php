<?php

require_once "../../models/MusicaModel.php";

class MusicaController {

    private $model;

    function __construct()
    {
        $this->model = new MusicaModel();
    }

    public function read() {
        return $this->model->read();
    }

    public function add(Musica $c) {
        return $this->model->create($c);
    }

    public function edit(Musica $c) {
        return $this->model->update($c);
    }

    public function findId($id) {
        return $this->model->findId($id);
    }

    public function remove($id) {
        return $this->model->delete($id);
    }

}