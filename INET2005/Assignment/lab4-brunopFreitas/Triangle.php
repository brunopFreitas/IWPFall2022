<?php
require_once("Shape.php");
class Triangle extends Shape implements iResizable
{
    private $base;
    private $height;

    public function __construct($in_name,$in_base, $in_height)
    {
        parent::__construct($in_name);
        $this->base  = $in_base;
        $this->height  = $in_height;
    }

    public function CalculateArea()
    {
        return number_format(($this->base * $this->height)/2,2);
    }

    public function Resize($in_value, $in_type)
    {
        if($in_type=='grow') {
            $this->height = $in_value;
            return self::CalculateArea();
        }
    }
}