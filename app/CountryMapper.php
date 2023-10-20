<?php

declare(strict_types=1);

namespace App;

use Rinvex\Country\Country;

class CountryMapper {

    private string $countryName;

    public function __construct(?string $countryName = null) {
        $this->countryName = $countryName;
    }

    public function getCountryDetails(?string $countryName = null): ?array {
        $country = country($this->convertNameToCode($countryName));

        if (!$country) {
            return null;
        }

        return [
            'currency' => $country->getCurrency(),
            'languages' => implode(", ", $country->getLanguages()),
            'capital' => $country->get('capital'),
        ];
    }

    private function convertNameToCode(?string $countryName = null): string {
        $mapping = [
            'Latvia' => 'LV',
            'Germany' => 'DE',
            'United States' => 'US',
            'Canada' => 'CA',
            'Australia' => 'AU'
        ];

        return $mapping[$countryName] ?? '';
    }
}