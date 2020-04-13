<?php

echo '<ul>';
foreach ($emails as $email) {
    echo "<li>{$email['email']} =  {$email['COUNT(email)']}шт</li>\r\n";
}
echo '</ul>';


