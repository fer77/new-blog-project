<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
  use DatabaseTransactions; //* It undoes everything (test) that you just did.
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        //$this->assertTrue(true);
        //* Test the archives method in Post.php
        //* Given (sets up the test): I have two records in the database that are posts, and each on e is posted a month apart.
        $first = factory(Post::class)->create(); //* This  month.

        $second = factory(Post::class)->create(['created_at' => \Carbon\Carbon::now()->subMonth()]); //* Last month.

        //* When (performs the action): I fetch the archives.
        $posts = Post::archives();
        // dd($posts);

        //* Then (creates the assertion): the response should be in the proper format.
        // $this->assertCount(2, $posts);
        //* 'created_at' is an instance of Carbon.
        $this->assertEquals([
          [
            "year" => $first->created_at->format('Y'),
            "month" => $first->created_at->format('F'),
            "published" => 1
          ],
          [
            "year" => $second->created_at->format('Y'),
            "month" => $second->created_at->format('F'),
            "published" => 1
          ],
        ], $posts);
    }
}
