This is news index page
<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div class="main">
            <?php echo $news_item['text'] ?>
        </div>
        <p><a href="http://dev.ydev.me:8080/news/<?php echo $news_item['slug'] ?>">View article</a></p>

    <?php endforeach ?>