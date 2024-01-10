<?php

interface IserviceArticle {
    public function insert(Article $article);
    public function edit(Article $article);
    public function delete($id);
    public function display();
    public function search($query);
}






?>