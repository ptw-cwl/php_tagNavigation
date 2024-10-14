<?php

//查询标签
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
        $tags[] = [
            'name' => $row['name'],  //标签
            'count' => $row['count'] //计数
        ];
    }

    $db->close();
    return $tags;
}

//根据标签查询关联标签
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
        $associationTags[] = $row['association_tag']; //关联标签
    }

    $db->close();

    return $associationTags;
}


//根据标签查询链接
function selectLinks($tagName)
{
    $db = new SQLite3(dirname(__FILE__)  . '/db/tagNavigation.db');

    $sql = "
        select l.name, l.icon, l.href, l.status, l.tags
        from (select tl.link
              from tag_link tl
              where tl.tag = :tagName
              group by tl.link) tl
                 left join (select l.name, l.icon, l.href, l.status, GROUP_CONCAT(distinct tl.tag) as tags
                            from link l
                                     left join tag_link tl
                                               on tl.link = l.href
                            group by l.name, l.icon, l.href, l.status) l
                           on tl.link = l.href
    ";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':tagName', $tagName, SQLITE3_TEXT);

    $result = $stmt->execute();
    $links = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $links[] = [
            'name' => $row['name'],         // 名称
            'icon' => $row['icon'],         // 图标
            'href' => $row['href'],         // 链接
            'status' => $row['status'],     // 状态
            'tags' => explode(',', $row['tags'])  // 将标签字符串转换为数组
        ];
    }

    $db->close();

    return $links;
}
