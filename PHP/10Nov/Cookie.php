<?php
class Cookie{
    private Luck $luck;
    private bool $isOpened;

    public function __construct(Luck $luck) {
        $this->luck = $luck;
        $this->isOpened = false;
    }

    public function open() {
        if ($this->isOpened) {
            throw new Exception("Cookie has already been opened.");
        }
        $this->isOpened = true;
        return $this->luck->getText();
    }

    private static function randomCookie() {
        $luckText = Luck::randomLuck();
        $luck = new Luck($luckText);
        return new Cookie($luck);
    }

    public static function generateRandomCookies(int $count) {
        if ($count <= 0) {
            throw new InvalidArgumentException("Count must be a positive integer.");
        }
        $cookies = [];
        for ($i = 0; $i < $count; $i++) {
            $cookies[] = self::randomCookie();
        }
        return $cookies;
    }
}

?>