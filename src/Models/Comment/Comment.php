<?php
    namespace src\Models\Comment;
    use src\ActiveRecordEntity;
    use src\Models\User\User;

    class Comment extends ActiveRecordEntity
    {

        protected $authorId;
        protected $articleId;
        protected $text;
        protected $createdAt;
        
        public function getText(){
            return $this->text;
        }
        public static function getTableName():string
        {
            return 'comments';
        }
        public function getAuthor():User {
            $user = User::getById($this->authorId);
            return $user;
        }
        public function getCreationTime() {
            return $this->createdAt;
        }

        public function getArticleId() {
            return $this->articleId;
        }

        public function setText(string $text){
            $this->text = $text;
        }

        public function setAuthorId(string $authorId){
            $this->authorId = $authorId;
        }

        public function setArticleId(string $articleId){
            $this->articleId = $articleId;
        }
    }
?>