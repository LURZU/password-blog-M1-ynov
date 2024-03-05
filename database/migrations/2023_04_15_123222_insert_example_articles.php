<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertExampleArticles extends Migration
{
    public function up()
    {
        DB::table('posts')->insert([
            [
                'slug' => 'article-1',
                'name' => 'Premier article',
                'content' => 'Contenu du premier article.',
            ],
            [
                'slug' => 'article-2',
                'name' => 'Deuxième article',
                'content' => 'Contenu du deuxième article.',
            ],
            [
                'slug' => 'article-3',
                'name' => 'Troisième article',
                'content' => 'Contenu du troisième article.',
            ],
        ]);
    }

    public function down()
    {
        DB::table('posts')->truncate();
    }
}
