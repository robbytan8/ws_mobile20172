<?php

/**
 * Description of UserDaoImpl
 *
 * @author Robby
 */
class UserDaoImpl {

    /**
     *
     * @var User $data
     */
    private $data;

    public function setData($data) {
        $this->data = $data;
    }

    public function login() {
        if (isset($this->data) && !empty($this->data)) {
            $query = 'SELECT * FROM user WHERE username = ? AND password = MD5(?) LIMIT 1';
            $link = DBUtil::createdPDOConnection();
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getUsername(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getPassword(), PDO::PARAM_STR);
            $stmt->setFetchMode(PDO::FETCH_OBJ | PDO::FETCH_PROPS_LATE);
            $stmt->execute();
            $result = $stmt->fetch();
            $this->data = NULL;
            DBUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

}
