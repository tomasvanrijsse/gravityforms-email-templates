<?php


class NoTemplate extends GFEmailTemplate
{

    /**
     * Return the title of the email template
     * @return string
     */
    function getTitle(): string
    {
        return 'No template';
    }

    /**
     * Return an array containing all applicable fields for the email template
     * @return array
     */
    function getFields(): array
    {
        return [
            'message' => 'wysiwig'
        ];
    }

    /**
     * Return the $notification with the `message` property updated and ready to be send.
     * @param $notification
     * @param $form
     * @param $entry
     * @return array $notifications
     */
    static function notificationFilter($notification, $form, $entry): array
    {
        // leave $notification['message'] untouched
        return $notification;
    }
}
