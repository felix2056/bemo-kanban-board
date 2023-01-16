<?php

namespace Database\Seeders;

use App\Models\Column;
use Illuminate\Database\Seeder;

class KanbanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Column::create([
            'title' => 'To Do',
            'order' => 1
        ]);

        Column::create([
            'title' => 'In Progress',
            'order' => 2
        ]);

        Column::create([
            'title' => 'Done',
            'order' => 3
        ]);

        foreach (Column::all() as $column) {
            $column->cards()->createMany([
                [
                    'title' => 'Card 1',
                    'description' => 'Lorem ipsum si dalet 1',
                    'order' => 1,
                ],
                [
                    'title' => 'Card 2',
                    'description' => 'Lorem ipsum si dalet 2',
                    'order' => 2,
                ],
                [
                    'title' => 'Card 3',
                    'description' => 'Lorem ipsum si dalet 3',
                    'order' => 3,
                ],
                [
                    'title' => 'Card 4',
                    'description' => 'Lorem ipsum si dalet 4',
                    'order' => 4,
                ],
                [
                    'title' => 'Card 5',
                    'description' => 'Lorem ipsum si dalet 5',
                    'order' => 5,
                ],
            ]);
        }
    }
}
