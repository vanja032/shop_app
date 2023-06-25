<?php
require_once "Category.php";

class Item
{
    public $id;
    public $name;
    public $description;
    public $category;
    public $image;
    public $price;
    public $quantity;

    public function __construct($id, $name, $description, Category $category, $image, $price, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->image = $image;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

?>