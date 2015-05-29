<?php foreach ($news as $news_item): ?>

  
    
    <h2>
    <?php 
    echo $news_item['title'];
    // echo $news_item->getTitle();
    ?>
    </h2>
    
    <div class="main">
        <?php
        echo $news_item['text'];
        //echo $news_item->getText();
        ?>
    </div>
    <p><a href="news/<?php 
    echo $news_item['id'];
    //echo $news_item->getId();
    ?>">View article</a></p>
    
    <p><a href="news/delete/<?php
    echo $news_item['id'];
    //echo $news_item->getId(); 
    ?>">Delete article</a></p>
    
<?php endforeach ?> 

<hr> 
<p><a href="news/create"> Create news</a> </p>
<p><a href="/~xdeng/index.php/home"> Home</a> </p>
<p><a href="/~xdeng/index.php/about"> About</a> </p>


