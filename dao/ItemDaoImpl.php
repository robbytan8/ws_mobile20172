<?php

/**
 * Description of ItemDaoImpl
 *
 * @author Robby
 */
class ItemDaoImpl {

    /**
     *
     * @var Item $data
     */
    private $data;

    public function setData(Item $data) {
        $this->data = $data;
    }

    public function findAll() {
        $query = 'SELECT i.id, i.name, i.price, c.id AS category_id, c.name AS category_name FROM item i JOIN category c ON c.id = i.category_id ORDER BY i.name';
        $link = DBUtil::createdPDOConnection();
        $stmt = $link->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Item');
        $stmt->execute();
        DBUtil::closePDOConnection($link);
        return $stmt;
    }

    public function save() {
        if (isset($data) && !empty($data)) {
            $link = DBUtil::createdPDOConnection();
            $query = 'INSERT INTO item(name, price, category_id) VALUES(?, ?, ?)';
            $stmt = $link->prepare($query);
            $stmt->bindValue(1, $this->data->getName(), PDO::PARAM_STR);
            $stmt->bindValue(2, $this->data->getPrice());
            $stmt->bindValue(1, $this->data->getCategory()->getId(),
                    PDO::PARAM_INT);
            $result = $stmt->execute();
            DBUtil::closePDOConnection($link);
            return $result;
        }
        return NULL;
    }

}
