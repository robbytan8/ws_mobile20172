<?php

/**
 * Description of User
 *
 * @author Robby
 */
class User implements JsonSerializable {

    private $id;
    private $name;
    private $username;
    private $password;

    public function __construct() {
        settype($this->id, 'int');
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
