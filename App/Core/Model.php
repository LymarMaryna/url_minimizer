<?php


namespace App\Core;


use App\Core\Database\DbAbstract;

class Model extends DbAbstract
{
    public function findOne($hash, $check_date = false)
    {
        if(empty($hash)) {
            return false;
        }
        $andWhere = '';
        if($check_date) {
            $andWhere = 'AND (end_date > NOW() OR end_date IS NULL)';
        }
        $sql = "SELECT * FROM `{$this->table}` WHERE hash = :hash {$andWhere} LIMIT 1";

        $query = $this->db->prepare($sql);

        $query->execute(['hash' => $hash]);
        $res = $query->fetchObject();

        return $res;
    }

    public function insert($data)
    {
        if(empty($data['url']) || empty($data['hash'])) {
            return false;
        }
        $sql = "INSERT INTO `{$this->table}`";
        $sql .= "(" . implode(",", array_keys($data)) . ")";
        $sql .= "VALUES(:" . implode(",:", array_keys($data)) . ")";
        $query = $this->db->prepare($sql);
        $query->execute($data);
        return $this->db->lastInsertId();
    }

    public function update($data, $id = null)
    {
        if (is_null($id)) {
            return false;
        }

        $sql = "UPDATE `{$this->table}` SET ";

        foreach ($data as $k => $v) {
            $sql .= "$k = :$k, ";
        }
        $data['id'] = $id;

        $sql = substr($sql, 0, -2);
        $sql .= " WHERE id = :id";

        $query = $this->db->prepare($sql);
        $query->execute($data);

        $count = $query->rowCount();

        return $count;
    }

    public function delete($id = null)
    {
        if (empty($id)) {
            return false;
        }

        $sql = "DELETE FROM `{$this->table}` WHERE id = :id ";
        $query = $this->db->prepare($sql);
        $res = $query->execute(['id' => $id]);

        return $res;
    }

}