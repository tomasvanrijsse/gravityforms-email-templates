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
     * Return the merged fields and email template ready to be send.
     * @param array $fields
     * @return string
     */
    abstract function getHtmlBody(array $fields): string;

}
