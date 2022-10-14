<?php
require_once("Shape.php");
class Rectangle extends Shape
{
    private $length;
    private $height;

    public function __construct($in_name,$in_length, $in_width)
    {
        parent::__construct($in_name);
        $this->length  = $in_length;
        $this->height  = $in_width;
    }

    public function CalculateArea()
    {
        return number_format(($this->length * $this->height),2);
    }
}