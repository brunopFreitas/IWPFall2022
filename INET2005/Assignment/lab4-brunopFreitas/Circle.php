<?php
require_once("Shape.php");
require_once("iResizable.php");
class Circle extends Shape implements iResizable
{
    const pi = 3.14;
    private $radius;

    public function __construct($in_name,$in_radius)
    {
        parent::__construct($in_name);
        $this->radius  = $in_radius;
    }

        public function CalculateArea()
    {
        return number_format((pow($this->radius, 2)*self::pi),2);
    }

    public function Resize($in_value, $in_type)
    {
        $area = self::CalculateArea();
        if($in_type=='grow') {
            return ($area + ($in_value / 100 ) * $area);
        } elseif ($in_type=='shrink') {
            return ($area - ($in_value / 100 ) * $area);
        }

    }
}