<?php
namespace app\models;
     
    class Nilai extends \mako\Model
    {
    public function add($nim, $grade,$matkul)
    {
    return $this->connection->table('nilai')
    ->insert(array('nim' => $nim, 'matkul' => $matkul, 'grade'=>$grade));
    }
    public function getById($id)
    {
    return $this->connection->table('nilai')
    ->where('id', '=', $id)
    ->first();
    }
    public function getAll()
    {
    return $this->connection->table('nilai')
    ->orderBy('id', 'desc')
    ->all();
    }
    public function update($id, $grade, $matkul,$nim)
    {
    return (boolean) $this->connection->table('nilai')
    ->where('id', '=', $id)
    ->update(array('matkul' => $matkul, 'grade' => $grade,'nim'=>$nim));
    }
    public function delete($id)
    {
    return (boolean) $this->connection->table('nilai')
    ->where('id', '=', $id)
    ->delete();
    }
    }