<?phprequire_once "header.php";?><body><div class="container">        <?php//        $search = '%'.$_GET['search'].'%';        $_GET['search'] = trim($_GET['search']);        $_GET['search'] = htmlspecialchars($_GET['search']);        $sql = mysqli_query($GLOBALS['link'],"SELECT Name_of_product,Price,image_path FROM `info` WHERE Name_of_product LIKE  '%{$_GET['search']}%' OR Article LIKE '{$_GET['search']}'");        $num = mysqli_num_rows($sql);        if(mysqli_affected_rows($GLOBALS['link'])) {            echo '<p>По вашему запросу  найдено совпадений: ' . $num . '</p> ';            echo '<p>Результаты поиска :</p>';        }        else{        echo "Ничего не найдено";        }        ?>        <div class="row">       <? while($result = mysqli_fetch_array($sql)):            ?>            <div class="col-md-3 ml-6 bestseller positioner-of-product">                <a href="#"><img class="img_product" src= "<?php echo "images/products/".$result['image_path']; ?>" alt="Кольцо"></a>                <hr>                <div>                    Название товара: <br><strong><?echo $result['Name_of_product'];?></strong>                </div>                <br>                <div>                    <?echo $result['Price'].'₽';?>                </div>            </div>        <? endwhile;?>    </div></div><hr></body><?phprequire_once "footer.html"?>