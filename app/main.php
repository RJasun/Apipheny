<?php
require_once 'vendor/autoload.php';

use App\FetchAPI;
use App\UniversityCollection;
use App\CountryMapper;

$apiFetcher = new FetchAPI();

echo "University Finder:\n";
echo "1. Search by Country\n";
echo "2. Search by Country and University Name\n";
echo "0. Exit\n";
echo "Enter your choice: ";
$choice = readline();

$universityCollection = new UniversityCollection();

switch ($choice) {
    case '1':
        $country = readline("Enter the country name: ");
        $countryMapper = new CountryMapper($country);
        $countryDetails = $countryMapper->getCountryDetails($country);
        $universityCollection = $apiFetcher->fetchData($country);
        break;

    case '2':
        $country = readline("Enter the country name: ");
        $name = readline("Enter the university name: ");
        $countryMapper = new CountryMapper($country);
        $countryDetails = $countryMapper->getCountryDetails($country);
        $universityCollection = $apiFetcher->fetchData($country, $name);
        break;

    case '0':
        echo "Goodbye!\n";
        exit;

    default:
        echo "Invalid choice.\n";
        exit;
}

if ($countryDetails) {
    echo "Country: " . $country . "\n";
    echo "Capital: " . $countryDetails['capital'] . "\n";
    echo "Languages: " . $countryDetails['languages'] . "\n";
    echo "-------------------------\n";
}

$universities = $universityCollection->getUniversities();

foreach ($universities as $university) {
    echo "Name: " . $university->getName() . "\n";
    echo "Country: " . $university->getCountry() . "\n";
    echo "Web Page: " . $university->getWebPage() . "\n";
    echo "-------------------------\n";
}