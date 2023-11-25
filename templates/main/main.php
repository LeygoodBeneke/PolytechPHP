<?php require(dirname(__DIR__).'/header.html')?>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Feedback</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count = 1;
    foreach($articles as $article){
        echo '<tr>
            <th scope="row">'.$count.'</th>
            <td>
              <a href="http://localhost/Project/www/article/'.$article->getId().'">'.$article->getTitle().'
              </a>
            </td>
            <td>'.$article->getText().'</td>
            <td>
              <a href="http://localhost/Project/www/article/'.$article->getId().'">Comments
              </a>
            </td>
            </tr>';
        $count+= 1;
    }
    ?>
    </tbody>
</table>
<script>
    let count = 0;

    function handleClick() {
        count += 1;
    }
</script>
<?php require(dirname(__DIR__).'/footer.html')?>

    