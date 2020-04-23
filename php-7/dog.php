<?php
/**
 * Created by PhpStorm.
 * User: Iman
 * Date: 23/04/2020
 * Time: 12:05 PM
 */

class Dog
{
    private $dog_weight = 22;
    private $dog_breed = "no breed";
    private $dog_color = "no color";
    private $dog_name = "no name";
    private $error_message = "-No ERR-";

    function __construct($name, $breed, $color, $weight)
    {
        $name_error = $this->set_dog_name($name) == true ? 'true,' : 'false,';
        $breed_error = $this->set_dog_breed($breed) == true ? 'true,' : 'false,';
        $color_error = $this->set_dog_color($color) == true ? 'true,' : 'false,';
        $weight_error = $this->set_dog_weight($weight) == true ? 'true,' : 'false';

        $this->error_message = $name_error . $breed_error . $color_error . $weight_error;
    }

    public function __toString()
    {
        return $this->error_message;
    }


    function set_dog_name($value)
    {
        $error_message = TRUE;
        (ctype_alpha($value) && strlen($value) < 21) ? $this->dog_name = $value : $error_message = FALSE;
        return $error_message;
    }

    function set_dog_weight($value)
    {
        $error_message = TRUE;
        (ctype_digit($value) && ($value > 0 && $value <= 120)) ? $this->dog_weight = $value : $error_message = FALSE;
        return $error_message;
    }

    function set_dog_breed($value)
    {
        $error_message = TRUE;
        (ctype_alpha($value) && strlen($value) <= 35) ? $this->dog_breed = $value : $error_message = FALSE;
        return $error_message;
    }

    function set_dog_color($value)
    {
        $error_message = TRUE;
        (ctype_alpha($value) && strlen($value) <= 15) ? $this->dog_color = $value : $error_message = FALSE;
        return $error_message;
    }

    function display_properties()
    {
        print "Dog name is $this->dog_name, weight is $this->dog_weight, color is $this->dog_color, breed is $this->dog_breed";
    }

    /**
     * @return int
     */
    public function getDogWeight()
    {
        return $this->dog_weight;
    }

    /**
     * @return string
     */
    public function getDogBreed()
    {
        return $this->dog_breed;
    }

    /**
     * @return string
     */
    public function getDogColor()
    {
        return $this->dog_color;
    }

    /**
     * @return string
     */
    public function getDogName()
    {
        return $this->dog_name;
    }

    function get_properties()
    {
        return "$this->dog_weight,$this->dog_breed,$this->dog_color";
    }

}



