<?php

namespace App\Models;

class Clinic
{
    private string $id;
    private string $name;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? '';
        $this->name = $data['name'] ?? '';
    }

    /**
     * @return mixed|string
     */
    public function getName(): mixed
    {
        return $this->name;
    }

    public function __get(string $name): string
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return '';
    }
}
