<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    
    public function getPosts()
    {
        return $this->session->get('posts');
    }

    public function getPost($id)
    {
       
        return $this->session->get('posts')[$id];
    }

    public function addPost($title, $content)
    {
        $posts = $this->session->get('posts');
        array_push($posts, ['title' => $title, 'content' => $content]);
        $this->session->put('posts', $posts);
    }

    public function editPost($id, $title, $content)
    {
        $posts = $this->session->get('posts');
        $posts[$id] = ['title' => $title, 'content' => $content];
        $this->session->put('posts', $posts);
    }

    private function createDummyData()
    {
        $posts = [
            [
                'title' => 'Learning Laravel',
                'content' => 'This blog post will get you right on track with Laravel!'
            ],
            [
                'title' => 'Something else',
                'content' => 'Some other content'
            ]
        ];
        $this->session->put('posts', $posts);
    }

}