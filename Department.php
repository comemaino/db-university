<?php
class Department {
  public $id;
  public $name;
  public $address;
  public $phone;
  public $email;
  public $website;
  public $head_of_department;

  function __construct($_id, $_name) {
    $this->id = $_id;
    $this->name = $_name;
  }

  public function setContactData($_address, $_phone, $_email, $_website) {
    $this->address = $_address;
    $this->phone = $_phone;
    $this->email = $_email;
    $this->website = $_website;
  }

  public function getContactsAsArray() {
    return [
      "address" => $this->address,
      "phone" => $this->phone,
      "email" => $this->email,
      "website" => $this->website,
    ];
  }

}
?>