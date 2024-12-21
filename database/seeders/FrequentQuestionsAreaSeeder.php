<?php

namespace Database\Seeders;

use App\Models\FrequentQuestionsArea;
use Illuminate\Database\Seeder;

class FrequentQuestionsAreaSeeder extends Seeder
{
    public function run(): void
    {
        FrequentQuestionsArea::firstOrCreate([
            'id' => 1
        ],[
            'short_title' => 'FEEL FREE TO ASK QUESTION',
            'main_title' => 'Let\'s Start a Free of Questions and Get a Quick Support',
            'description' => 'We are the agency who always gives you a priority on the free of question and you can easily make a question on the bunch.',
            'first_question' => 'How I Will Book a Room or Resort?',
            'first_answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo. Mauris a ante placerat, dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur leo nibh, ultrices vel ultricies eu, vulputate at felis.',
            'second_question' => 'How I Will Be Able to Add on the Admin Portal?',
            'second_answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo. Mauris a ante placerat, dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur leo nibh, ultrices vel ultricies eu, vulputate at felis.',
            'third_question' => 'What are the Benefits of These Agencies?',
            'third_answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo. Mauris a ante placerat, dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur leo nibh, ultrices vel ultricies eu, vulputate at felis.',
            'fourth_question' => 'How I Will Make Payment for Room Book?',
            'fourth_answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam at diam leo. Mauris a ante placerat, dignissim orci eget, viverra ante. Mauris ornare pellentesque augue. Curabitur leo nibh, ultrices vel ultricies eu, vulputate at felis.',
        ]);
    }
}
