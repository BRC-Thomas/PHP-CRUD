<?php
echo '<p><code>htmlspecialchars(strip_tags($_POST[\'nom\']), ENT_QUOTES | ENT_SUBSTITUTE, \'UTF-8\')</code> -> ';
echo htmlspecialchars(strip_tags($_POST['nom']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '<br>';
echo '<code>filter_var($_POST[\'nom\'], FILTER_SANITIZE_SPECIAL_CHARS)</code> -> ';
echo filter_var($_POST['nom'], FILTER_SANITIZE_SPECIAL_CHARS) . '<br>';
echo '<code>filter_input(INPUT_POST, htmlspecialchars(\'nom\'))</code> -> ';
echo filter_input(INPUT_POST, htmlspecialchars('nom')) . '</p>';