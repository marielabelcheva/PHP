<?php
class Luck {
    private $text;

    public function __construct($text) {
        $this->setText($text);
    }

    public function setText($text) {
        if (is_string($text) && !empty($text)) {
            $this->text = $text;
        } else {
            throw new InvalidArgumentException("Text must be a string and cannot be empty.");
        }
    }

    public function getText() {
        return $this->text;
    }

    public static function randomLuck() {
        $url = 'https://api.chucknorris.io/jokes/random';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-Script');
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($response === false || $httpCode !== 200) {
            return "Error: Unable to fetch joke.";
        }
        
        $data = json_decode($response, true);
        return $data['value'] ?? "Error: Invalid JSON response.";
    }
}
?>