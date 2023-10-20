<?php declare(strict_types=1);
namespace App;
class University {
    public string $name;
    public string $country;
    public string $webPage;
    public string $domain;

    public function __construct(string $name, string $country, string $webPage, string $domain) {
        $this->name = $name;
        $this->country = $country;
        $this->webPage = $webPage;
        $this->domain = $domain;
    }

    public function getName(): string {
        return $this->name;
    }
    public function getCountry(): string {
        return $this->country;
    }
    public function getWebPage(): string {
        return $this->webPage;
    }
}