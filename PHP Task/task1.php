<?php

/**
 * Find and display files in the files folder with specific criteria.
 *
 * This code searches for files in the files folder with names consisting of
 * numbers and letters of the Latin alphabet and having the .ixt extension.
 * It then displays the names of these files, ordered by name.
 */

// Define the directory path where you want to search for files.
$directory = 'files';

// Define the regular expression pattern to match filenames.
$pattern = '/^[A-Za-z0-9]+\.ixt$/';

// Initialize an empty array to store matching filenames.
$matchingFiles = [];

// Check if the directory exists and is readable.
if (is_dir($directory) && is_readable($directory)) {
    // Open the directory for reading.
    if ($handle = opendir($directory)) {
        // Iterate through the files in the directory.
        while (($file = readdir($handle)) !== false) {
            // Check if the file name matches the pattern.
            if (preg_match($pattern, $file)) {
                $matchingFiles[] = $file;
            }
        }
        closedir($handle);
    }

    // Sort the matching files alphabetically.
    sort($matchingFiles);

    // Display the sorted file names.
    foreach ($matchingFiles as $file) {
        echo $file . PHP_EOL;
    }
} else {
    echo "The specified directory is not valid or not readable.";
}
