<?php

function selectTag()
{
    $db = new SQLite3(DB_URL);
    $result = $db -> query('SELECT * FROM tag');
    $tags = [];
    while ($row = $result -> fetchArray(SQLITE3_ASSOC)) {
        $tags[] = $row['name'];
    }
    $db->close();
    return $tags;
}