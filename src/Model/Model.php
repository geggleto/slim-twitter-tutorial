<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-06
 * Time: 11:13 AM
 */

namespace Twitter\Model;


abstract class Model
{

    private $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array
     */
    public function toArray() {
        $data = [];
        foreach ($this->attributes as $name) {
            if (!empty($this->$name)) {
                $data[$name] = $this->$name;
            }
        }
        return $data;
    }

    public function setData(array $data) {
        foreach ($this->attributes as $name) {
            if (!empty($data[$name])) {
                $this->$name = $data[$name];
            }
        }

        return $this;
    }
}