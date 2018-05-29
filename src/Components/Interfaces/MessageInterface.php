<?php
/**
 * Message interface
 */
namespace Surge\Components\Interfaces;

interface MessageInterface {

    /**
     * Set badge
     * @param string $badge
     * @return $this
     */
    public function setBadge($badge);

    /**
     * Set the group
     * @param string $group
     * @return $this
     */
    public function setGroup($group);

    /**
     * Set the big picture
     * @param string $bigPicture
     * @return $this
     */
    public function setBigPicture($bigPicture);

    /**
     * Set the large icon
     * @param string $icon
     * @return $this
     */
    public function setLargeIcon($icon);

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
