<?php


$messages = getMessages(connectDB());

renderView('guestbook',  ['messages' => $messages]);
