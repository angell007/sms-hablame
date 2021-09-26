<?php

namespace Danilo\SmsHablame;

use Illuminate\Support\Facades\Http;

class Hablame
{
    /** @var string $api Clave API suministrada por Háblame SMS. */
    protected $api = null;

    /** @var string $client Número del cliente en Háblame SMS. */
    protected $client = null;

    /** @var string $token Número del tokene en Háblame SMS. */
    protected $token = null;


    /**
     * Crea una instancia recibiendo el número del cliente y la clave.
     *
     * @param string $client
     * @param string $api
     * @param string $token
     */
    public function __construct(string $client, string $api, string $token)
    {
        $this->client = $client;
        $this->api = $api;
        $this->token = $token;
    }

    /**
     * Consulta el saldo.
     *
     * @return array
     */
    public function checkBalance(): array
    {
        $url = 'https://api103.hablame.co/api/account/v1/status';

        $params = [
            'account' => $this->client,
            'apikey' => $this->api,
            'token' => $this->token
        ];

        $response = Http::withHeaders($params)->get($url);
        return json_decode((string)$response->getBody(), true);
    }

    /**
     * Envía un mensaje de texto (SMS) al destinatario o destinatarios indicados.
     *
     * @param string $phoneNumbers Número(s) telefonico(s) a enviar SMS (separados por coma).
     * @param string $sms Mensaje de texto a enviar.
     * @param string|null $datetime [optional] Fecha de envío. Si está vacío, se envía inmediatamente.
     * @param string|null $reference [optional] Número de referencia o nombre de campaña.
     * @return array
     */
    public function sendMessage(

        string $phoneNumbers,
        string $sms,
        string $datetime = null

    ): array {
        $url = 'https://api103.hablame.co/api/sms/v3/send/marketing';

        $params = [
            'toNumber' => $phoneNumbers,
            'sms' => $sms,
            'sendDate' => $datetime,
        ];

        $headers = [
            'account' => $this->client,
            'apikey' => $this->api,
            'token' => $this->token
        ];

        $response = Http::withHeaders($headers)->post($url, $params);
        return json_decode((string)$response->getBody(), true);
    }
}
