<?php

namespace App\Models;

class Patient
{
    private string $id;
    private string $name;
    private string $email;
    private string $phone;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->phone = $data['phone'] ?? '';
    }

    public function __get(string $name): string
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return '';
    }
}
