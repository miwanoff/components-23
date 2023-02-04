<!— Компонентный подход. Шаблон гостевой книги. —>
    <html>

    <head>
        <title>гостевая книга</title>
        <meta charset="UTF*" />
    </head>

    <body>
        <!— Блок ввода нового сообщения. —>
            <?php include "component_gbook_add.php";?>
            <h2>Добавьте свое сообщение:</h2>
            <form method="post">
                Ваше имя: <input type=text name="new[name]"><br>
                Комментарий:<br>
                <textarea name="new[text]" cols="60" rows="5"></textarea>
                <br> <input type="submit" name="doAdd" value="Добавить!">
            </form>
            <!— Блок сообщений гостевой книги. —>
                <?php include "component_gbook_show.php";?>
                <h2>Сообщения гостевой книги:</h2>
                <?php foreach ($Data as $id => $e) {?>
                Имя:
                <?=$e['name'];?><br />
                Время:
                <?=date("d.m.Y H:i:s", $id)?><br />
                <br /> Комментарий:
                <br />
                <?=$e['text'];?>
                <br /> <?php }?>
                <!-- Блок новостей -->
                <h2>Последние новости:</h2>
                <?php include "component_news_show.php";?>

                <!-- <?php print_r($Data); ?> -->
                <ul>
                    <?php foreach ($Data as $i => $n) {?>
                    <li>
                        <?=$i + 1;?>-я новость:
                        <!-- <?php print_r($n);?> -->
                        <?=$n["name"]." ".$n["text"];?>
                    </li>
                    <?php }?>
                </ul>
    </body>

    </html>