<?php

namespace Bschmitt\Amqp\Support\Testing\Fakes;

use Bschmitt\Amqp\Amqp;
use Closure;

class AmqpFake extends Amqp
{

    private array $messagesToConsume = [];

    public function shouldReceiveMessage(AMQPMessageFake $messageFake): void
    {
        $this->messagesToConsume[] = $messageFake;
    }

    public function consume(string $queue, Closure $callback, array $properties = [])
    {
        $consumer = new ConsumerFake($this->messagesToConsume);

        $consumer->consume($queue, $callback);
    }

}
