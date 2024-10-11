<?php

function selectTag()
{
    $db = new SQLite3(dirname(__FILE__) . '/db/tagNavigation.db');

    $sql = "
        SELECT t.name, COUNT(tl.link) AS count
        FROM tag t
        LEFT JOIN tag_link tl ON t.name = tl.tag
        GROUP BY t.name
    ";

    $result = $db->query($sql);
    $tags = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $tags[] = ['name' => $row['name'], 'count' => $row['count']];
    }

    $db->close();
    return $tags;
}

function selectAssociationTags($tagName)
{
    $db = new SQLite3(dirname(__FILE__)  . '/db/tagNavigation.db');

    $sql = "
        select association_tag
        from association_tag
        where tag = :tagName
        group by association_tag
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':tagName', $tagName, SQLITE3_TEXT);

    $result = $stmt->execute();
    $associationTags = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $associationTags[] = $row['association_tag'];
    }

    $db->close();

    return $associationTags;
}
