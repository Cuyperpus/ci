<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BooksSeeder extends Seeder
{
    public function run()
    {
        $model = model('BookModel');

        $collections = [
            [
                'title' => 'The Lord of the Rings',
                'slug' => 'the-lord-of-the-rings',
                'isbn'  => '978-602-8519-93-9',
            ],
            [
                'title' => 'Laptop Si Unyil',
                'slug' => 'laptop-si-unyil',
                'isbn'  => '978-602-8519-93-8',
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'isbn'  => '978-602-8519-93-7',
            ],
        ];

        $model->insertBatch($collections);
    }
}
