<?php

class RegistrantSubmitter
{
  public function submit($location, LassoLead $lead, $apiKey) {
    //open connection
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HEADER, 'application/json');
    curl_setopt($curl, CURLOPT_URL, $location);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($lead->toArray()));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'X-Lasso-Auth:'. 'Token='. $apiKey . ',Version=1.0',
    ));
    curl_exec($curl);

    return $curl;
  }
}
