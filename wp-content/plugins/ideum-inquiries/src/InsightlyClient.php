<?php namespace Ideum\Inquiries;

class InsightlyClient
{
    const BASE_URL = 'https://api.insight.ly';
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = Config::get('insightly_api_key');
    }

    public function addLead($data)
    {
        $postData = array(
            'FIRST_NAME'   => $data['first-name'],
            'LAST_NAME'    => $data['last-name'],
            'BACKGROUND'   => "Comments:\n$data[comments]",
            'CONTACTINFOS' => array(
                array(
                    'TYPE'   => 'Email',
                    'DETAIL' => $data['email']
                )
            ),

        );

        if ($data['contact-by-phone'] === 'yes') {
            $postData['CONTACTINFOS'][] = array(
                'TYPE'   => 'Phone',
                'DETAIL' => $data['phone']
            );
        }

        if (isset($data['company'])) {
            $postData['BACKGROUND'] .= "\n\nCompany:\n$data[company]";
        }

        if (isset($data['service'])) {
            $postData['BACKGROUND'] .= "\n\nInterested In:";
            foreach ($data['service'] as $key => $val) {
                $postData['BACKGROUND'] .= "\n * $val";
            }
        }

        /* We have to use cURL directly for this because wp_remote_post behaves
         * badly.  It will assume any response with a "Location" header is a
         * redirect and repeat the request (including HTTP verb and body) to
         * the new URL.  Given that the "201 Created" returned by Insightly has
         * a "Location" header, and given that Insightly will treat any POST to
         * "/v2/Contacts/*" as a new CREATE request, this causes an infinite
         * record creation loop.  Fun.  This should be fixed in WP 2.7. */
        $ch = curl_init(self::BASE_URL.'/v2/Contacts');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey.':');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_exec($ch);

        if (curl_errno($ch)) {
            wp_die(curl_error($ch));
        }

        curl_close($ch);
    }
}
