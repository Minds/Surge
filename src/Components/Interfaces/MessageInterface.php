<?php
/**
 * Message interface
 */
namespace Surge\Components\Interfaces;

interface MessageInterface{

    /**
     * Set the device token
     * @param string $token
     * @return $this
     */
    public function setToken($token);

    /**
     * Set the title
     * @param string title
     * @return $this;
     */
    public function setTitle($title);

    /**
     * Set the message
     * @param string $message
     * @return $this
     */
    public function setMessage($message);

    /**
     * Set sound
     * @param string $sound
     * @return $this
     */
    public function setSound($sound);

    /**
     * Set json object
     * @param string $json
     * @return $this
     */
    public function setJsonObject($json);

    /**
     * Export the message to json format.
     * @return string
     */
    public function toJSON();

}
