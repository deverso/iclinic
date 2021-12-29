<?php

namespace App\Models;

class Physician
{
    private string $id;
    private string $name;
    private string $crm;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
        $this->crm = $data['crm'] ?? '';
    }

    public function __get(string $name): string
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return '';
    }
}
