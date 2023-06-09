<?php
class Person {
    protected $id;
    protected $name;
    protected $dateBirth;
    protected $cpf;
    protected $phone;
    protected $cep;
    protected $street;
    protected $numberStreet;
    protected $neighborhood;
    protected $complement;
    protected $city;
    protected $state;
    protected $email;
    protected $password;

    // Métodos GET
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDateBirth() {
        return $this->dateBirth;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getStreet() {
        return $this->street;
    }

    public function getNumberStreet() {
        return $this->numberStreet;
    }

    public function getNeighborhood() {
        return $this->neighborhood;
    }

    public function getComplement() {
        return $this->complement;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    // Métodos SET
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDateBirth($dateBirth) {
        $this->dateBirth = $dateBirth;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function setNumberStreet($numberStreet) {
        $this->numberStreet = $numberStreet;
    }

    public function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
    }

    public function setComplement($complement) {
        $this->complement = $complement;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}





?>