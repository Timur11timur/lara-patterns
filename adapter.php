<?php

//Allows us to translate one interface with another
//Transmitter which wraps needed class and maps its methods

interface BookInterface
{
    public function open();

    public function turnPage();
}

class Book implements BookInterface
{
    public function open()
    {
        echo 'opening the paper book' . PHP_EOL;
    }

    public function turnPage()
    {
        echo 'turning the page of the paper book' . PHP_EOL;
    }
}

interface eReaderInterface
{
    public function turnOn();

    public function pressNextButton();
}

class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        echo 'turn the Kindle on' . PHP_EOL;
    }

    public function pressNextButton()
    {
        echo 'press the next button on the Kindle' . PHP_EOL;
    }
}

class eReaderAdapter implements BookInterface
{
    private eReaderInterface $reader;

    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        return $this->reader->turnOn();
    }

    public function turnPage()
    {
        return $this->reader->pressNextButton();
    }
}

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person())->read(new Book());
(new Person())->read(new eReaderAdapter(new Kindle()));