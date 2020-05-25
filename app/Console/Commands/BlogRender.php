<?php

namespace App\Console\Commands;

use App\Article;
use Illuminate\Console\Command;
use Parsedown;

class BlogRender extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:render';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renders blogs into their html equivalents';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $parsedown = new Parsedown();

        foreach(Article::all() as $article) {
            $article->body_html = $parsedown->text($article->body_md);

            $article->save();
        }
    }
}
