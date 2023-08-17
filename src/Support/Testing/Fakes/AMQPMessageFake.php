<?php

namespace Bschmitt\Amqp\Support\Testing\Fakes;

use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Wire\AMQPTable;

class AMQPMessageFake extends AMQPMessage
{

    public function __construct($body = '', array $headers = [], string $exchange = '', string $routingKey = '')
    {
        $properties = [
            'application_headers'=> new AMQPTable($headers),
        ];
        parent::__construct($body, $properties);
        $this->setDeliveryInfo(random_int(0, 1000), false, $exchange, $routingKey);
    }

}
