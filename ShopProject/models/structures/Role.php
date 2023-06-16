<?php

class Role
{
    public $id;
    public $name;
    public $description;
    public $created;

    public function __construct($id, $name, $description, $created)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->created = $created;
    }
}

?>