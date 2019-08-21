<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $category1=Category::create([
        'name' =>'Programming'
      ]);
      $category2=Category::create([
        'name' =>'Algorithm'
      ]);
      $category3=Category::create([
        'name' =>'Data Structure'
      ]);
      $author1= User::create([
        'name' => 'Md Hafizul Islam',
        'email'=>'hafizpustice05@gmail.com',
        'password'=>Hash::make('password')
      ]);
      $author2= User::create([
        'name' => 'Afroja Akter',
        'email'=>'afroja@gmail.com',
        'password'=>Hash::make('password')
      ]);
        $post1=Post::create([
          'title' =>'We relocated our office to a new designed garage',
          'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
          'category_id' => $category1->id,
          'image' => 'posts/1.jpg',
          'user_id'=>$author1->id
        ]);
        $post2=$author2->posts()->create([
          'title' =>'Top 5 brilliant content marketing strategies',
          'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
          'category_id' => $category2->id,
          'image' => 'posts/2.jpg'
        ]);
        $post3=$author1->posts()->create([
          'title' =>'Best practices for minimalist design with example',
          'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
          'category_id' => $category3->id,
          'image' => 'posts/3.jpg'
        ]);
        $post4=$author2->posts()->create([
          'title' =>'Congratulate and thank to Maryam for joining our team',
          'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has',
          'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
          'category_id' => $category3->id,
          'image' => 'posts/4.jpg'
        ]);
        $tag1=Tag::create([
          'name' =>'Programming'
        ]);
        $tag2=Tag::create([
          'name' =>'Algorithm'
        ]);
        $tag3=Tag::create([
          'name' =>'Data Structure'
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post1->tags()->attach([$tag1->id,$tag3->id]);
        $post1->tags()->attach([$tag2->id,$tag3->id]);
        $post1->tags()->attach([$tag2->id,$tag2->id]);
    }
}
