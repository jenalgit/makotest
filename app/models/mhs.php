<?php
    namespace app\models;
     
    class Mhs extends \mako\Model
    {
    public function add($nim, $nama)
    {
    return $this->connection->table('mhs')
    ->insert(array('nim' => $nim, 'nama' => $nama));
    }
    public function getByNim($nim)
    {
    return $this->connection->table('mhs')
    ->where('nim', '=', $nim)
    ->first();
    }
    public function getAll()
    {
    return $this->connection->table('mhs')
    ->orderBy('id', 'desc')
    ->all();
    }
    public function update($nimold, $nama, $nim)
    {
    return (boolean) $this->connection->table('mhs')
    ->where('nim', '=', $nimold)
    ->update(array('nama' => $nama, 'nim' => $nim));
    }
    public function delete($id)
    {
    return (boolean) $this->connection->table('mhs')
    ->where('id', '=', $id)
    ->delete();
    }
    }