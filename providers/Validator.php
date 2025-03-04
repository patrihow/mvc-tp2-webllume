<?php
namespace App\Providers;

class Validator {
    
    private $errors = array();
    private $key;
    private $value;
    private $name;

    public function field($key, $value, $name = null){
        $this->key = $key;
        $this->value = $value;
        if($name == null){
            $this->name = ucfirst($key);
        }else{
            $this->name = ucfirst($name);
        }
        return $this;
    }

    public function required(){
        if(empty($this->value)){
            $this->errors[$this->key]="$this->name est requis !";
        }
        return $this;
    }

    public function max($length){
        if(strlen($this->value) > $length ){
            $this->errors[$this->key]="$this->name doit être inférieur à $length caractères!";
        }
        return $this;
    }

    public function min($length){
        if(strlen($this->value) < $length ){
            $this->errors[$this->key]="$this->name doit être supérieur à $length caractères!";
        }
        return $this;
    }

    public function number(){
        if(!empty($this->value) && !is_numeric($this->value)){
            $this->errors[$this->key]="$this->name doit être un nombre!";
        }
        return $this;	    
    }

    public function email(){
        if(!empty($this->value) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)){  
            $this->errors[$this->key]="$this->name invalid!";
        }
        return $this;	    
    }

    public function isSuccess(){
        if(empty($this->errors)) return true;
    }

    public function getErrors(){
        if(!$this->isSuccess()) return $this->errors;
    }

    public function name() {
        if (!preg_match("/^[a-zA-ZÀ-ÿ '-]+$/", $this->value)) {
            $this->errors[$this->key] = "$this->name doit contenir uniquement des lettres!";
        }
        return $this;
    }

    public function biographie() {
        if (strlen($this->value) > 100) {
            $this->errors[$this->key] = "$this->name doit être inférieur à 100 caractères!";
        }
        return $this;
    }

}

