<?php

namespace App\Tests\Validation;

use App\Entity\Book;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BookValidationTest extends KernelTestCase
{
    public function makeBook(): Book{
        $book = new Book();
        $book->setTitle('Harry Potter');
        $book->setIsbn('978-3-16-14841');
        $book->setPublishedAt(new \DateTime('1951-07-16'));
        return $book;
    }

    //Verification du titre -> pas de titre
    public function testBlankTitle(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $book = $this->makeBook();
        $book->setTitle('');

        $errors = $validator->validate($book);
        $this->assertCount(1, $errors);
    }

    //Verification de l'isbn -> pas d'isbn
    public function testBlankIsbn(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $book = $this->makeBook();
        $book->setIsbn('');

        $errors = $validator->validate($book);
        $this->assertCount(2, $errors);
        //1er erreur pour le notBlank, 2eme pour la taille != 14
    }

    //Verification de la date de publication -> pas de date
    public function testBlankPublishedAt(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $book = new Book();
        $book->setTitle('Harry Potter');
        $book->setIsbn('978-3-16-14841');

        $errors = $validator->validate($book);
        $this->assertCount(1, $errors);
    }

    //Verification livre valide
    public function testBook(): void
    {
        self::bootKernel();
        $validator = static::getContainer()->get('validator');

        $book = $this->makeBook();

        $errors = $validator->validate($book);
        $this->assertCount(0, $errors);
    }
}
