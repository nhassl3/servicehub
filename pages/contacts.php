<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub | Контакты</title>
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link href="/assets/css/style-contacts.css" rel="stylesheet" />
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/connect_favicon.php'; ?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/header.php'; ?>

    <main>
        <article>
            <header>
                <h2>Связаться</h2>
            </header>
            <section>
                <form action="" method="POST">
                    <label for="name" class='cap-small-text'>имя</label>
                    <input type="text" placeholder="Введите свое имя" id="name" name="name">
                    <label for="email" class='cap-small-text'>адрес электронной почты</label>
                    <input type="text" id="email" placeholder="Введите свой email" name="email">
                    <label for="message" class='cap-small-text'>сообщение</label>
                    <input type="text" id="message" name="message" placeholder="Введите свое сообщение">

                    <button type="submit">Отправить</button>
                </form>
            </section>
        </article>
    </main> 

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.php'; ?>
</body>
