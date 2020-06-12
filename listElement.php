<?php

class ListElement
{
    public $id;
    public string $author;
    public string $description;

    public function __construct(int $id, string $author, string $description)
    {
        $this->id = $id;
        $this->author = $author;
        $this->description = $description;
    }
}