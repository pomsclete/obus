<?php

if (!function_exists('array_to_object')) {

    /**
     * Convert Array into Object in deep
     *
     * @param array $array
     * @return
     */
    function array_to_object($array)
    {
        return json_decode(json_encode($array));
    }
}

if (!function_exists('empty_fallback')) {

    /**
     * Empty data or null data fallback to string -
     *
     * @return string
     */
    function empty_fallback ($data)
    {
        return ($data) ? $data : "-";
    }
}

if (!function_exists('create_button')) {

    function create_button ($action, $model)
    {
        $action = str_replace($model, "", $action);

        return [
            'submit_text' => ($action == "update") ? "Mettre à jour" : "Enregistrer",
            'submit_response' => ($action == "update") ? "Mis à jour." : "Sauvegardé.",
            'submit_response_notyf' => ($action == "update") ? "Données ".$model." mis à jour avec succès" : "Data ".$model." sauvegardées avec succés"
        ];
    }


    if (!function_exists('base64url_encode')) {

        function base64url_encode($data)
        {
            $b64 = base64_encode($data);

            if ($b64 === false) {
                return false;
            }
            $url = strtr($b64, '+/', '-_');
            return rtrim($url, '=');
        }
    }

    if (!function_exists('base64url_decode')) {

        function base64url_decode($data, $strict = false)
        {
           $b64 = strtr($data, '-_', '+/');
            return base64_decode($b64, $strict);
        }
    }

      if (!function_exists('format_number')) {

        function format_number($data)
        {
           return number_format($data, ((int) $data == $data ? 0 : 2), '.', ' ');
        }
    }
}