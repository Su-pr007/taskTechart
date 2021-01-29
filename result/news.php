<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="content">


        <?php
            require_once 'Paginator.class.php';
            include "connect.php";
            
            $limit = 5;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $query = "SELECT * FROM news ORDER BY `idate` desc";

            $Paginator = new Paginator($connect, $query);

            $result = $Paginator->getData($limit, $page);
            $connect->close();

            
            ?>


        <div class="content_block bottom_dotted">
            <h1>Новости</h1>
        </div>
        <div class="content_block bottom_dotted">
            <?php for($i = 0; $i < count($result->data); $i++):   ?>
            <div class="news">
                <span class="news_date">
                    <?php echo date('d.m.Y', $result->data[$i]['idate']);  ?>
                </span>
                <a href="/view.php/?id=<?php echo $result->data[$i]['id'] ?>">
                    <?php echo $result->data[$i]['title']  ?>
                </a>
                <div>
                    <?php echo $result->data[$i]['announce']   ?>
                </div>
                </div>
            <?php  endfor; ?>
        </div>
        <div class="content_block">
            Страницы:
            <div class="pages">
            
                <?php for($i = 1; $i<=$Paginator->getPageCount(); $i++): ?>
                    <a href="?page=<?php echo $i ?>" class="button<?php if($i==$_GET['page'] || (!isset($_GET['page']) && $i==1)) echo " selected" ?>"><?php echo $i ?></a>
                <?php endfor; ?>

            </div>
        </div>



    </div>
</body>
</html>