<?php

namespace App\Tests\Unit;

use App\Entity\Author;
use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    //Lier des livres à un auteur
    public function testLink(): void
    {
        $author = new Author();
        $book = new Book();
        $book2 = new Book();

        $author->addBook($book)
            ->addBook($book2);

        $this->assertCount(2, $author->getBooks());
    }

    //Suppression d'un livre pour un auteur
    public function testRemoveLink(): void
    {
        $author = new Author();
        $book = new Book();
        $book2 = new Book();

        $author->addBook($book)
            ->addBook($book2);

        $author->removeBook($book);

        $this->assertCount(1, $author->getBooks());
    }
}
