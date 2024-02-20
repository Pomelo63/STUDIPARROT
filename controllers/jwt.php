<?php
require_once './models/config.php';

class JWT
{


    public function createJWT(array $header, array $payload): string
    {
        //Transform our Variable to a base64 json.
        $b64header = base64_encode(json_encode($header));
        $b64payload = base64_encode(json_encode($payload));
        $b64header = str_replace(['+', '/', '='], ['-', '_', ''], $b64header);
        $b64payload = str_replace(['+', '/', '='], ['-', '_', ''], $b64payload);
        //Transform Signature to base64
        $secret = base64_encode(SECRET);
        $secret = str_replace(['+', '/', '='], ['-', '_', ''], $secret);

        $signature = hash_hmac('sha256', $b64header . '.' . $b64payload . '.' . $secret, true);
        $b64signature =  base64_encode($signature);
        $b64signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($b64signature));

        $jwt = $b64header . '.' . $b64payload . '.' . $b64signature;

        return $jwt;
    }

    public function verifyJWT(string $token): bool
    {
        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);
        $secret = $this->getSecret(SECRET);
        $nToken = $this->createJWT($header, $payload, $secret);
        return $token === $nToken;
    }
    private function getSecret(string $secret)
    {
        $secret = base64_encode(SECRET);
        $secret = str_replace(['+', '/', '='], ['-', '_', ''], $secret);
        return $secret;
    }
    public function getHeader(string $token)
    {
        $array = explode('.', $token);
        $header = json_decode(base64_decode($array[0]), true);
        return $header;
    }
    public function getPayload(string $token)
    {
        $array = explode('.', $token);
        $payload = json_decode(base64_decode($array[1]), true);
        return $payload;
    }
    public function isActif(string $token): bool
    {
        $payload = $this->getPayload($token);
        $now = new DateTime();
        $now = $now->getTimestamp();
        return $payload["exp"] < $now;
    }
    public function getAdminRight(string $token){
        $payload = $this->getPayload($token);
        return $payload["roles"];
    }
}
