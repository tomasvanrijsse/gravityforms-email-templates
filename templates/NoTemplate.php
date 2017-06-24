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
     * Return the merged fields and email template ready to be send.
     * @param array $fields
     * @return string
     */
    function getHtmlBody(array $fields): string
    {
        return $fields['message'];
    }
}
