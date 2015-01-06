<?php namespace Ideum\Inquiries;

class Mailer
{
    const MAILTO = 'sales@ideum.com';

    public function sendNotification($data)
    {
        $body = "From:\n${data['first-name']} ${data['last-name']} <${data['email']}>";

        if ($data['contact-by-phone'] === 'yes') {
            $body .= "\n\nPhone: ${data['phone']}";
            $body .= "\nContact preference: ${data[time]}";
        }

        if (isset($data['company'])) {
            $body .= "\n\nCompany: ${data['company']}";
        }

        $body .= "\n\nComments:\n${data['comments']}";

        if (isset($data['service'])) {
            $body .= "\n\nInterested In:";
            foreach ($data['service'] as $key => $val) {
                $body .= "\n * $val";
            }
        }

        wp_mail(
            self::MAILTO,
            "You have a new inquiry from ${data['first-name']} ${data['last-name']}",
            $body,
            array('From' => $data['email'])
        );
    }
}
