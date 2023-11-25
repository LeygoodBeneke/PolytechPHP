<?php require(dirname(__DIR__).'/header.html')?>
<form action="http://localhost/Project/www/comment/update/<?=$comment->getId();?>" method="post">
  <div class="form-group">
    <label for="text">Text</label>
    <input type="text" class="form-control" id="text" name="text" value="<?=$comment->getText();?>">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <select class="form-control" name="author" id="author">
      <option value="<?=$comment->getAuthor()->getId();?>"><?=$comment->getAuthor()->getName();?></option>
    <?php foreach($users as $user):?>
        <option value="<?=$user->getId();?>"><?=$user->getName();?></option>
      <?php endforeach;?>
    </select>
</div>
<button type="submit" class="btn btn-primary">Update</button>
<p><a href="http://localhost/Project/www/comment/delete/<?=$comment->getId();?>" class="text-danger" onclick="return confirm('Вы уверены что хотите удалить данный комментарий?')">Delete Comment</a>
</form>
<?php require(dirname(__DIR__).'/footer.html')?>
