<?php

/**
 * Description of Item
 *
 * @author Robby
 */
class Item implements JsonSerializable {

    private $id;
    private $name;
    private $price;

    /**
     *
     * @var Category $category
     */
    private $category;

    public function __construct() {
        $this->category = new Category();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function __set($name, $value) {
        switch ($name) {
            case 'category_id':
                $this->category->setId($value);
                break;
            case 'category_name':
                $this->category->setName($value);
                break;
        }
    }

}
