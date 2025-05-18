<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceHub | Контакты</title>
    <link rel="stylesheet" href="/assets/css/style.css" />
    <link rel="stylesheet" href="/assets/css/style-form.css" />
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/connect_favicon.php'; ?>
    <style>
        .bright-text {
            color: #000;
        }
    </style>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/header.php'; ?>

    <main>
        <article class="description">
            <header>
                <h2 class="big-less-weight">Основные контакты</h2>
            </header>
            <hr class="w-50-line">
            <section class="left-section area">
                <h3 class="bright-text">Поддержка</h3>
                <div>+7 (986) 745-81-25</div>
            </section>
            <section class="right-section area">
                <h3 class="bright-text">Электронная почта</h3>
                <div>nhassl3@nhassl3.ru</div>
            </section>
        </article>

        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Abbfff341bee350da094a16b0281792994ae74ea07fe1bff6046846868a458d85&amp;source=constructor" width="100%" height="850px" frameborder="0" style="position:relative; margin-top: 5em; margin-bottom: 5em;"></iframe>
        <article class="feedback-form">
            <header>
                <h2 class="h-2">Связаться</h2>
            </header>
            <form style="width: 415px;">
                <section>
                    <label for="name" class='lbl-int'>имя</label>
                    <input type="text" placeholder="Введите свое имя" id="name" name="name" class="ipt-data" autocomplete="additional-name">
                </section>
                <section>
                    <label for="email" class='lbl-int'>адрес электронной почты</label>
                    <input type="text" id="email" placeholder="Введите свой email" name="email" class="ipt-data" autocomplete='email'>
                </section>
                <section>
                    <label for="message" class='lbl-int'>сообщение</label>
                    <textarea type="text" id="message" name="message" placeholder="Введите свое сообщение" class="ipt-data" maxlength=200 rows=30></textarea>
                </section>

                <button type="submit" class="btn-submit">Отправить</button>
            </form>
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/pages/footer.html'; ?>
</body>