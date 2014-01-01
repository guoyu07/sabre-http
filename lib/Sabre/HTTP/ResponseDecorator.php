<?php

namespace Sabre\HTTP;

/**
 * Response Decorator
 *
 * This helper class allows you to easily create decorators for the Response
 * object.
 *
 * @copyright Copyright (C) 2009-2014 fruux GmbH. All rights reserved.
 * @author Evert Pot (http://evertpot.com/)
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class ResponseDecorator implements ResponseInterface {

    use MessageDecoratorTrait;

    /**
     * Constructor.
     *
     * @param ResponseInterface $inner
     */
    public function __construct(ResponseInterface $inner) {

        $this->inner = $inner;

    }

    /**
     * Returns the current HTTP status code.
     *
     * @return int
     */
    public function getStatus() {

        return $this->inner->getStatus();

    }


    /**
     * Returns the human-readable status string.
     *
     * In the case of a 200, this may for example be 'OK'.
     *
     * @return string
     */
    public function getStatusText() {

        return $this->inner->getStatusText();

    }
    /**
     * Sets the HTTP status code.
     *
     * This can be either the full HTTP status code with human readable string,
     * for example: "403 I can't let you do that, Dave".
     *
     * Or just the code, in which case the appropriate default message will be
     * added.
     *
     * @param string|int $status
     * @return void
     */
    public function setStatus($status) {

        $this->inner->setStatus($status);

    }

    /**
     * Sends the HTTP response back to a HTTP client.
     *
     * This calls php's header() function and streams the body to php://output.
     *
     * @return void
     */
    public function send() {

        $this->inner->send();

    }

}
