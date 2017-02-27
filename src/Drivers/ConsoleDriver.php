<?php
namespace Sempro\ConsoleDriver\Drivers;

use Mpociot\BotMan\Answer;
use Mpociot\BotMan\Drivers\Driver;
use Mpociot\BotMan\Interfaces\UserInterface;
use Mpociot\BotMan\Message;
use Mpociot\BotMan\Question;
use Mpociot\BotMan\User;
use Symfony\Component\HttpFoundation\Request;

class ConsoleDriver extends Driver
{
    private $payload;

    const DRIVER_NAME = 'Console';

    /**
     * @param Request $request
     * @return void
     */
    public function buildPayload(Request $request)
    {
        $this->payload = $_SERVER['argv'];
    }

    /**
     * Determine if the request is for this driver.
     *
     * @return bool
     */
    public function matchesRequest()
    {
        return app()->runningInConsole();
    }

    /**
     * Retrieve the chat message(s).
     *
     * @return array
     */
    public function getMessages()
    {
        return [new Message($this->payload[2], '', '')];
    }

    /**
     * @return bool
     */
    public function isBot()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isConfigured()
    {
        return false;
    }

    /**
     * Retrieve User information.
     * @param Message $matchingMessage
     * @return UserInterface
     */
    public function getUser(Message $matchingMessage)
    {
        return new User;
    }

    /**
     * @param Message $message
     * @return Answer
     * @internal param Message $matchingMessage
     *
     */
    public function getConversationAnswer(Message $message)
    {
        return Answer::create($message->getMessage())->setMessage($message);
    }

    /**
     * @param string|Question $message
     * @param Message $matchingMessage
     * @param array $additionalParameters
     * @return $this
     */
    public function reply($message, $matchingMessage, $additionalParameters = [])
    {
        if (isset($this->payload[3]) and ($this->payload[3] === '--log')) {
            info([$message, $matchingMessage, $additionalParameters]);
        }

        if ($message instanceof Question) {
            echo $message->getText();
        } elseif ($message instanceof \Mpociot\BotMan\Messages\Message) {
            echo $message->getMessage();

            if (!empty($message->getImage())) {
                echo "\n";
                echo $message->getImage();
            }

            if (!empty($message->getVideo())) {
                echo "\n";
                echo $message->getVideo();
            }
        } else {
            echo $message;
        }

        echo "\n\n";
    }

    /**
     * Return the driver name.
     *
     * @return string
     */
    public function getName()
    {
        return self::DRIVER_NAME;
    }
}
