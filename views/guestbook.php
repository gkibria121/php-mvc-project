<main>


    <h1>Guest Messages</h1>
    <?php foreach ($messages as $key => $message): ?>
        <div>

            <h2><?= $message['name'] ?></h2>
            <p><?= $message['email'] ?></p>
            <p><?= $message['message'] ?></p>
        </div>
    <?php endforeach ?>

</main>