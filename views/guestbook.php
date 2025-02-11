<main>


    <h1>Guest Messages</h1>
    <?php foreach ($messages as $key => $message): ?>
        <div>

            <h2><?= htmlspecialchars($message['name'], encoding: "UTF-8") ?></h2>
            <p><?= htmlspecialchars($message['email'], encoding: "UTF-8") ?></p>
            <p><?= htmlspecialchars($message['message'], encoding: "UTF-8") ?></p>
        </div>
    <?php endforeach ?>

</main>