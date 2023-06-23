<?php

class Cart
{
    private $cart = [];

    public function __construct($item_id = null)
    {
        if ($item_id != null) {
            $this->AddItem($item_id);
        } else {
            $this->cart = [];
        }
    }

    public function AddItem($item_id)
    {
        if (array_key_exists($item_id, $this->cart)) {
            $this->cart[$item_id] += 1;
        } else {
            $this->cart[$item_id] = 1;
            echo "B";
        }
        return $this->Count();
    }

    public function Get()
    {
        return $this->cart;
    }

    public function Count()
    {
        $count = 0;
        foreach ($this->cart as $item => $value) {
            $count += $value;
        }
        return $count;
    }
}

?>