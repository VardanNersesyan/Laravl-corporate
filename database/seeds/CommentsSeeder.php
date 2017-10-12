<?php

use Illuminate\Database\Seeder;
use Corp\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            [
                'text'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'name'      => 'Vardan',
                'email'     => 'Nersesyan.V.A@gmail.com',
                'site'      => 'corporate.fatal-world.com',
                'parent_id' => 0,
                'created_at' => '2017-10-12 21:57:50',
                'article_id' => 1,
                'user_id' => NULL,
            ],
            [
                'text'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'name'      => 'Vardan',
                'email'     => 'Nersesyan.V.A@gmail.com',
                'site'      => 'corporate.fatal-world.com',
                'parent_id' => 0,
                'created_at' => '2017-10-12 21:57:50',
                'article_id' => 1,
                'user_id' => 1,
            ],
            [
                'text'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'name'      => 'Vardan',
                'email'     => 'Nersesyan.V.A@gmail.com',
                'site'      => 'corporate.fatal-world.com',
                'parent_id' => 1,
                'created_at' => '2017-10-12 21:57:50',
                'article_id' => 1,
                'user_id' => 1,
            ],
            [
                'text'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'name'      => 'Vardan',
                'email'     => 'Nersesyan.V.A@gmail.com',
                'site'      => 'corporate.fatal-world.com',
                'parent_id' => 3,
                'created_at' => '2017-10-12 21:57:50',
                'article_id' => 1,
                'user_id' => 1,
            ],
            [
                'text'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'name'      => 'Vardan',
                'email'     => 'Nersesyan.V.A@gmail.com',
                'site'      => 'corporate.fatal-world.com',
                'parent_id' => 0,
                'created_at' => '2017-10-12 21:57:50',
                'article_id' => 1,
                'user_id' => NULL,
            ],
            [
                'text'      => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'name'      => 'Vardan',
                'email'     => 'Nersesyan.V.A@gmail.com',
                'site'      => 'corporate.fatal-world.com',
                'parent_id' => 5,
                'created_at' => '2017-10-12 21:57:50',
                'article_id' => 1,
                'user_id' => NULL,
            ],
        ]);
    }
}
