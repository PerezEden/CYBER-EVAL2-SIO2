<?php

namespace App\Tests\Service;

use App\Entity\Book;
use App\Entity\Client;
use App\Service\BorrowingManager;
use PHPUnit\Framework\TestCase;

class BorrowingManagerTest extends TestCase
{
    //Client a déjà emprunter 5 livres
    public function testTooMuchBooks(): void
    {
        $client = new Client();
        $client->setBorrowedBooksCount(5);

        $manager = new BorrowingManager();
        $this->assertFalse($manager->canBorrowBook($client, new Book()));
    }

    //Client peut emprunter livre disponible
    public function testBorrowAvailableBook(): void
    {
        $client = new Client();
        $client->setBorrowedBooksCount(0);

        $book = new Book();
        $book->setIsBorrowed(false);

        $manager = new BorrowingManager();
        $this->assertTrue($manager->canBorrowBook($client, $book));
    }

    //Client ne peut pas emprunter livre non disponible
    public function testBorrowNotAvailableBook(): void
    {
        $client = new Client();
        $client->setBorrowedBooksCount(0);

        $book = new Book();
        $book->setIsBorrowed(true);

        $manager = new BorrowingManager();
        $this->assertFalse($manager->canBorrowBook($client, $book));
    }
}
