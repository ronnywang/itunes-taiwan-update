<?php

include(__DIR__ . '/init.inc.php');

$top_url = 'http://itunes.apple.com/tw/genre/dian-ying/id33?l=zh';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $top_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, 0);
$message = curl_exec($curl);
curl_close($curl);


if (!preg_match_all('#<a href="([^"]*)" class="top-level-genre" title="[^"]*">[^<]*</a>#', $message, $matches)) {
    die('failed');
}

foreach ($matches[1] as $genre_url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $genre_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    $message = curl_exec($curl);
    curl_close($curl);

    preg_match_all('#<li><a href="(http://itunes.apple.com/tw/movie/[^/]*/id([0-9]+)\?l=zh)">([^<]*)</a> </li>#', $message, $matches);


    foreach ($matches[0] as $id => $data) {
        $url = $matches[1][$id];
        $movie_id = $matches[2][$id];
        $movie_name = $matches[3][$id];

        if (Movie::find($movie_id)) {
            continue;
        }

        Movie::insert(array(
            'id' => $movie_id,
            'url' => $url,
            'description' => $movie_name,
            'created_at' => time(),
        ));
    }
}

