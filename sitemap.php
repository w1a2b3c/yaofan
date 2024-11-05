<?php
include("wp-config.php");
require_once(ABSPATH . './wp-blog-header.php');
$ltime = get_lastpostmodified();
$ltime = gmdate('Y-m-d\TH:i:s+00:00', strtotime($ltime));
$posts_to_show = 2000;
$str = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.baidu.com/schemas/sitemap-mobile/1/">';

$str .= "
    <url>
    <loc>" . get_home_url() . "</loc>
    <lastmod>" . $ltime . "</lastmod>
    <changefreq>always</changefreq>
    <priority>1.0</priority>
    </url>
    ";

// 文章 code by 3inch.cn
$myposts = get_posts("numberposts=" . $posts_to_show);
foreach ($myposts as $post) {
    $str .= "<url>\r\n";
    $str .= "<loc>" . urldecode(get_permalink()) . "</loc>\r\n";
    $str .= "<lastmod>" . gmdate('Y-m-d\TH:i:s+00:00', strtotime(get_page($post->ID)->post_modified)) . "</lastmod>\r\n";
    $str .= "<changefreq>always</changefreq>\r\n";
    $str .= "<priority>0.9</priority>\r\n";
    $str .= "</url>\r\n";
}

// 标签 code by 3inch.cn
$tags = get_terms("post_tag");
foreach ($tags as $key => $tag) {
    $link = get_term_link(intval($tag->term_id), "post_tag");
    if (is_wp_error($link))
        return false;
    $tags[$key]->link = $link;

    $str .= "<url>\r\n";
    $str .= "<loc>" . urldecode($link) . "</loc>\r\n";
    $str .= "<lastmod>" . gmdate('Y-m-d\TH:i:s+00:00', strtotime(get_page($post->ID)->post_modified)) . "</lastmod>\r\n";
    $str .= "<changefreq>daily</changefreq>\r\n";
    $str .= "<priority>0.5</priority>\r\n";
    $str .= "</url>\r\n";
}

// 分类 code by 3inch.cn
$terms = get_terms('category', 'orderby=name&hide_empty=0');
$count = count($terms);
if ($count > 0) {
    foreach ($terms as $term) {
        $str .= "<url>\r\n";
        $str .= "<loc>" . urldecode(get_term_link($term, $term->slug)) . "</loc>\r\n";
        $str .= "<lastmod>" . gmdate('Y-m-d\TH:i:s+00:00', strtotime(get_page($post->ID)->post_modified)) . "</lastmod>\r\n";
        $str .= "<changefreq>always</changefreq>\r\n";
        $str .= "<priority>0.3</priority>\r\n";
        $str .= "</url>\r\n";
    }
}

// 页面 code by 3inch.cn
$mypages = get_pages();
if (count($mypages) > 0) {
    foreach ($mypages as $page) {
        $str .= "<url>\r\n";
        $str .= "<loc>" . urldecode(get_page_link($page->ID)) . "</loc>\r\n";
        $str .= "<lastmod>" . gmdate('Y-m-d\TH:i:s+00:00', strtotime(get_page($page->ID)->post_modified)) . "</lastmod>\r\n";
        $str .= "<changefreq>monthly</changefreq>\r\n";
        $str .= "<priority>0.5</priority>\r\n";
        $str .= "</url>\r\n";
    }
}

$str .= "</urlset>";
file_put_contents('./sitemap.xml', $str);
echo '更新 sitemap.xml 成功！ <a href="/sitemap.xml"> 查看</a>';
?>
