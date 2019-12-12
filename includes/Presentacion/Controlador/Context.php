<?php

namespace es\ucm;

class Context
{

    private $event;
    private $data;


    public function __construct($event, $data)
    {
        $this->event = $event;
        $this->data = $data;
    }


    public function setEvent($event)
    {
        $this->event = $event;
    }

    public function getEvent()
    {
        return $this->event;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
    public function getData()
    {
        return $this->data;
    }
}
