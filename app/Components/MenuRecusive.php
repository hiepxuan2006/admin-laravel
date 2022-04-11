<?php

namespace App\Components;

class MenuRecusive
{
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function MenuRecusiveAdd($parentID, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentID) && $parentID == $value['id']) {

                    $this->htmlSelect .= "<option selected value='{$value['id']}'>" . $text . $value['name'] . '</option>';
                } else {
                    $this->htmlSelect .= "<option value='{$value['id']}'>" . $text . $value['name'] . '</option>';
                }
                $this->MenuRecusiveAdd($parentID, $value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}
