<?php
namespace App\Providers;

class Validator
{
    private $errors = [];
    private $key;
    private $value;
    private $name;

    public function field($key, $value, $name = null)
    {
        $this->key   = $key;
        $this->value = $value;
        $this->name  = $name ? ucfirst($name) : ucfirst($key);
        return $this;
    }

    public function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->key] = "$this->name est requis";
        }
        return $this;
    }

    public function max($length)
    {
        if (strlen($this->value) > $length) {
            $this->errors[$this->key] = "$this->name doit avoir moins de $length caractères";
        }
        return $this;
    }

    public function min($length)
    {
        if (strlen($this->value) < $length) {
            $this->errors[$this->key] = "$this->name doit avoir plus de $length caractères";
        }
        return $this;
    }

    public function number()
    {
        if (!empty($this->value) && !is_numeric($this->value)) {
            $this->errors[$this->key] = "$this->name doit être un nombre";
        }
        return $this;
    }

    public function email()
    {
        if (!empty($this->value) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->key] = "Le format de $this->name est invalide";
        }
        return $this;
    }

    public function unique($model)
    {
        $model  = 'App\\Models\\' . $model;
        $model  = new $model;
        $unique = $model->unique($this->key, $this->value);
        if ($unique) {
            $this->errors[$this->key] = "$this->name doit être unique.";
        }
        return $this;
    }

    public function isSuccess()
    {
        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->isSuccess() ? [] : $this->errors;
    }
}