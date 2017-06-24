<?php


abstract class GFEmailTemplate
{

    /**
     * Return the title of the email template
     * @return string
     */
    abstract function getTitle(): string;

    /**
     * Return an array containing all applicable fields for the email template
     * @return array
     */
    abstract function getFields(): array;

    /**
     * Return the $notification with the `message` property updated and ready to be send.
     * @param $notification
     * @param $form
     * @param $entry
     * @return array $notifications
     */
    abstract static function notificationFilter($notification, $form, $entry): array;

}
