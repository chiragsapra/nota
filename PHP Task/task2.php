<?php

/**
 * Download and extract information from the Wikipedia homepage.
 *
 * This script downloads the Wikipedia homepage, parses its HTML content, and extracts headings,
 * abstracts, pictures, and links from the different sections of the page.
 */

// Define the database details and create the connection.
$host = "database";
$dbname = "lamp";
$user = "lamp";
$pass = "lamp";
$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}
echo 'Connected successfully<br/>';

// Download the Wikipedia homepage.
$wikipediaUrl = 'https://www.wikipedia.org/';
$html = file_get_contents($wikipediaUrl);

// Create a DOMDocument to parse the HTML content.
$dom = new DOMDocument();
libxml_use_internal_errors(true); // Suppress HTML validation errors
$dom->loadHTML($html);
libxml_use_internal_errors(false); // Re-enable error reporting

// Extract information from the sections of the page.
$sections = $dom->getElementsByTagName('div');

foreach ($sections as $section) {
    // Extract and display the section heading (if available) from the page.
    $heading = $section->getElementsByTagName('span')->item(0);
    if ($heading) {
        $headingSql = 'INSERT INTO wiki (title) VALUES (' . '"' . $heading->textContent . '"' . ')';
        mysqli_query($conn, $headingSql);
    }

    // Extract and display the abstract from the page.
    $abstract = $section->getElementsByTagName('p')->item(0);
    if ($abstract) {
        $abstractSql = 'INSERT INTO wiki (title, abstract) VALUES ("abstract", ' . '"' . $abstract->textContent . '"' . ')';
        mysqli_query($conn, $abstractSql);
    }

    // Extract and display pictures (image links) from the page.
    $images = $section->getElementsByTagName('img');
    foreach ($images as $image) {
        $imageData = $image->getAttribute('src');
        $imageSql = 'INSERT INTO wiki (title, picture) VALUES ("image", ' . '"' . $imageData . '"' . ')';
        mysqli_query($conn, $imageSql);
    }

    // Extract and display links from the page.
    $links = $section->getElementsByTagName('a');
    foreach ($links as $link) {
        $linkData = $link->getAttribute('href');
        $linkSql = 'INSERT INTO wiki (title, url) VALUES ("link", ' . '"' . $linkData . '"' . ')';
        mysqli_query($conn, $linkSql);
    }
}
echo 'Data added to db successfully' . PHP_EOL;

// Closing the database connection.
mysqli_close($conn);
