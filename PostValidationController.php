<?php

include __DIR__ . '/Validation/FormValidation.php' ;

class PostValidationController
{


    public function __construct(
        public string $id,
        public string $name,  
        public string $address,
    ){
        $this->formValidation = new FormValidation();
    }

    public function validationField()
    {

        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
        ];
        $validationResponse = $this->formValidation->validationField($data);
        var_dump($validationResponse);
        
    }


}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    $validation = new PostValidationController($id,$name,$address);
}



// $validation = new PostValidationController($id,$name,$address);
// $validation->validationField();