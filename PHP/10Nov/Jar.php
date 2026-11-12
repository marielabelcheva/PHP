<?php
class Jar {
    private array $cookies;
    private int $maxCapacity;

    public function __construct(array $cookies = null, int $maxCapacity = 10) {
        $this->setMaxCapacity($maxCapacity);
        $this->setCookies($cookies);
    }

    private function setMaxCapacity(int $maxCapacity) {
        if ($maxCapacity <= 0) {
            throw new InvalidArgumentException("Max capacity must be a positive integer.");
        }
        $this->maxCapacity = $maxCapacity;
    }
    private function setCookies(array $cookies) {
        if (count($cookies) > $this->maxCapacity) {
            throw new InvalidArgumentException("Number of cookies exceeds max capacity.");
        }
        $this->cookies = $cookies;
    }

    public function addCookie(Cookie $cookie) {
        if (count($this->cookies) >= $this->maxCapacity) {
            throw new Exception("Jar is full. Cannot add more cookies.");
        }
        array_push($this->cookies, $cookie);
    }

    public function drawCookie() {
        if (empty($this->cookies)) {
            throw new Exception("Jar is empty. No cookies to draw.");
        }
        $index = array_rand($this->cookies);

        $result = $this->cookies[$index];
        unset($this->cookies[$index]);
        return $result->open();

    }

    public function getCookiesCount() {
        return count($this->cookies);
    }
}
?>