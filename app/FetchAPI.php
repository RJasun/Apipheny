<?php
namespace App;
class FetchAPI {
    private string $baseUrl = "http://universities.hipolabs.com/search?";

    public function fetchData($country, $name = ''): UniversityCollection {
        $url = $this->baseUrl . "country=" . urlencode($country);

        if (!empty($name)) {
            $url .= "&name=" . urlencode($name);
        }

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        $collection = new UniversityCollection();

        foreach ($data as $universityData) {
            $collection->add(new University(
                $universityData['name'],
                $universityData['country'],
                $universityData['web_pages'][0],
                $universityData['domains'][0]
            ));
        }

        return $collection;
    }
}