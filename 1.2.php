<?php

interface ManageableInterface {
    public function addBook(Book $book);
    public function registerReader(Reader $reader);
}

trait LibraryLog {
    public function log($message) {
        echo "$message";
    }
   
}

class Book {
    private $title;
    private $author;

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }

    public function getInfo() {
        return "{$this->title} by {$this->author}";
    }

    public function __toString() {
        return $this->getInfo();
    }
}

class SpecialBook extends Book {
    private $genre;

    public function __construct($title, $author, $genre) {
        parent::__construct($title, $author); // Виклик батьківського конструктора
        $this->genre = $genre;
    }

    public function getDetailedInfo() {
        return "{$this->getInfo()} (Genre: {$this->genre})";
    }
}

class Reader {
    public $name;
    private $borrowedBooks = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function borrowBook(Book $book) {
        $this->borrowedBooks[] = $book;
    }

    public function getBorrowedBooks() {
        $booksInfo = [];
        foreach ($this->borrowedBooks as $book) {
            $booksInfo[] = $book->getInfo();
        }
        return $booksInfo;
    }
}

class LibraryManager implements ManageableInterface {
    use LibraryLog;
    private static $instance = null;
    private $books = [];
    private $readers = [];

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new LibraryManager();
        }
        return self::$instance;
    }

    public function addBook(Book $book) {
        $this->books[] = $book;
        $this->log("Added book: " . $book->getInfo());

    }

    public function registerReader(Reader $reader) {
        $this->readers[] = $reader;
        $this->log("Registered reader: " . $reader->name);

    }
}


$library = LibraryManager::getInstance();

// Додавання книг
$book1 = new Book("1984", "George Orwell");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee");
$library->addBook($book1);
$library->addBook($book2);

// Реєстрація читача
$reader1 = new Reader("Tom Smith");
$library->registerReader($reader1);

// Читач позичає книгу
$reader1->borrowBook($book1);
$reader1->borrowBook($book2);

echo $reader1->name . " borrowed books: \n";
print_r($reader1->getBorrowedBooks());


$specialBook = new SpecialBook("The Hobbit", "J.R.R. Tolkien", "Fantasy");
echo $specialBook; 
