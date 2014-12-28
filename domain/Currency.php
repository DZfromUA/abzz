<?php
//класс таблицы Currency
class Currency {
    private $id;
    private $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */


    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */

}