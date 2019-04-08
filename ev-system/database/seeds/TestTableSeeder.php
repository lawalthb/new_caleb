<?php

use Illuminate\Database\Seeder;
use App\Test;
use App\TestQuestion;
class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
            'subject_id' => '1',
            'duration' => '2000',
        ]);
        Test::create([
            'subject_id' => '1',
            'duration' => '2000',
        ]);
        TestQuestion::create([
            'test_id' => '1',
            'question' => 'A good example of protein is _________',
            'option_a' => 'Cocoyam',
            'option_b' => 'Egg',
            'option_c' => 'Cassava',
            'option_d' => 'Maize',
            'correct_answer' => 'Egg',
        ]);
        TestQuestion::create([
            'test_id' => '1',
            'question' => 'Example of a colour is ______',
            'option_a' => 'green',
            'option_b' => 'book',
            'option_c' => 'shoe',
            'option_d' => 'ball',
            'correct_answer' => 'green',
        ]);
        TestQuestion::create([
            'test_id' => '1',
			'question' => '_______ is an electronic machine that  accepts data, process data and gives out information',
            'option_a' => 'Pencil',
            'option_b' => 'book',
            'option_c' => 'computer',
            'option_d' => 'biro',
            'correct_answer' => 'computer',
        ]);
    }
}
