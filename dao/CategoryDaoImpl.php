<?php

/**
 * Description of CategoryDaoImpl
 *
 * @author Robby
 */
class CategoryDaoImpl {

    /**
     *
     * @var Category $data
     */
    private $data;

    public function setData($data) {
        $this->data = $data;
    }

    public function findAll() {
        $query = 'SELECT * FROM category ORDER BY name';
        $link = DBUtil::createdPDOConnection();
        $result = $link->prepare($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,
                'Category');
        $result->execute();
        DBUtil::closePDOConnection($link);
        return $result;
    }

}
