<?php

namespace Alfianizzah\Larafi\Helper;

class StringHelper
{
    public static function helloWorld()
    {
        return "hello world";
    }
    public static function stringToArray($string)
    {
        return explode(" ", $string);
    }
    public static function randomQuote()
    {
        $jsonData = file_get_contents(__DIR__ . "/../datasets/quotes.json");
        if ($jsonData === false) {
            echo "Error reading JSON file";
        } else {
            // Decode JSON data into associative array
            $data = json_decode($jsonData, true); // Passing true as the second parameter

            // Check if decoding was successful
            if ($data === null) {
                echo "Error decoding JSON";
            } else {
                $randomIndex = array_rand($data);

                // Display the decoded JSON data
                return $data[$randomIndex]["quote"];
            }
        }
    }
}
