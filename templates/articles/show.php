<?php require(dirname(__DIR__).'/header.html')?>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getTitle();?></h5>
    <p class="card-text"><?=$article->getText();?></p>
    <p class="card-text"><?=$user->getName()?></p>
    <a href="http://localhost/Project/www/article/edit/<?=$article->getId();?>" class="card-link">Update Article</a>
    <a href="http://localhost/Project/www/article/delete/<?=$article->getId();?>" class="card-link">Delete Article</a>
  </div>
</div>
<h1>Comments</h1>
<a href="http://localhost/Project/www/comment/create/<?=$article->getId();?>" class="card-link">Add comment</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Author</th>
      <th scope="col">text</th>
      <th scope="col">Creation time</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count = 1;
    foreach($comments as $comment){
        echo '<tr>
        <th scope="row">'.$count.'</th>
            <td>'.$comment->getAuthor()->getName().'</td>
            <td>'.$comment->getText().'</td>
            <td>'.$comment->getCreationTime().'</td>
            <td>
              <a href="http://localhost/Project/www/comment/edit/'.$comment->getId().'" class="card-link">Update comment</a>
            </td>
            </tr>';
        $count++;
    }
    ?>
    </tbody>
</table>
<?php require(dirname(__DIR__).'/footer.html')?>
