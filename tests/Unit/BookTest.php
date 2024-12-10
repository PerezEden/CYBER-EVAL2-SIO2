<?php

namespace App\Tests\Unit;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{

    public function makeBook(): Book{
        $book = new Book();
        $book->setTitle('Harry Potter');
        $book->setIsbn('978-3-16-148410-0');
        $book->setPublishedAt(new \DateTime('1951-07-16'));
        return $book;
    }

    //Test verification de l'entity book
    public function testBook(): void
    {
        $book = $this->makeBook();
        $this->assertEquals('Harry Potter', $book->getTitle());
        $this->assertEquals('978-3-16-148410-0', $book->getIsbn());
        $this->assertEquals(new \DateTime('1951-07-16'), $book->getPublishedAt());
    }

}
