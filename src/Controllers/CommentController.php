<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Article\Article;
use src\Models\Comment\Comment;
use src\Models\User\User;

class CommentController{
    private $view;

    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles'=>$articles]);
    }

    public function create($id){
        $users = User::findAll();
        $this->view->renderHtml('comments/create.php', ['users'=>$users, 'article'=>$id]);
    }

    public function store(){
        $comment = new Comment;
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['author']);
        $comment->setArticleId($_POST['article']);
        $comment->save();
        $this->index();
    }
    public function edit($id){
        $comment = Comment::getById($id);
        $users = User::findAll();
        // var_dump($user);
        $this->view->renderHtml('comments/edit.php', ['users'=>$users, 'comment'=>$comment]);
    }
    public function update(int $id){
        $comment = Comment::getById($id);
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['author']);
        $comment->save();
        $this->show($comment->getArticleId());
    }

    public function delete(int $id){
        $comment = Comment::getById($id);
        $comment->delete();
        $this->index();
    }

    public function show($id){
        $article = Article::getById($id);

        $comments = Comment::findByArticleId($id);

        $user = $article->getAuthorId();

        if (!$article){
            $this->view->renderHtml('main/error.php',[], 404);
            return;
        }
        $this->view->renderHtml('articles/show.php', ['article'=>$article, 'user'=>$user, 'comments'=>$comments]);
    }
    
}