<?php
header('content-type:application/json');

  function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

// echo random_string(50);

echo json_encode(random_string(50));

?>