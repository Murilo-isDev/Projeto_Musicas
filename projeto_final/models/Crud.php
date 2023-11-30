<?php

interface Crud {
    public function create($c);
    public function read();
    public function update($c);
    public function delete($id);
}