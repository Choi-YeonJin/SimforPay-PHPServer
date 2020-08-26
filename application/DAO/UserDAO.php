<?php
/**
 * 2020/8/14
 * Copyright (c) ITKOO
 *
 * UserModel - DAO
 */

namespace DAO;
use Model\UserModel;

include_once("application/lib/autoload.php");

class UserDAO extends BaseDAO
{
    protected $tableName = "user";

    /**
     * @param UserModel $userModel
     * @return false|int|null
     */
    public function insert(UserModel $userModel){
        $query = "INSERT INTO {$this->tableName} (
                    name,
                    created_at
                    ) VALUES (
                    '{$userModel->getName()}',  
                    {$userModel->getCreatedAt()})";

        $this->db->executeQuery($query);
        return $this->db->getInsertId();
    }

    /**
     * @param $id
     * @return UserModel
     */
    public function select($id){
        $query = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        $this->db->executeQuery($query);
        return $this->db->getResultAsObject(new UserModel());
    }

    /**
     * @return UserModel[]
     */
    public function selectAll(){
        $query = "SELECT * FROM {$this->tableName}";
        $this->db->executeQuery($query);
        return $this->db->getAllResultAsObject(new UserModel());
    }


}