<?php


namespace App\Service;


use App\Helper\LoggerTrait;
use Nexy\Slack\Client;


class SlackClient
{
    use LoggerTrait;

    private $slack;

    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }

    public function sendMessage(string $form, string $message)
    {
        $this->logInfo('Beaming a message to Slack!', [
            'message' => $message
        ]);

        $message = $this->slack->createMessage()
            ->from($form)
            ->withIcon(':ghost:')
            ->setText($message);
        $this->slack->sendMessage($message);
    }
}