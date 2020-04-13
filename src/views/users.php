<?php

echo '<ul>';
foreach ($users as $user) {
    echo "<li>id: {$user['id']}, login: {$user['login']}</li>\r\n";
}
echo '</ul>';


