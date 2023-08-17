<?php

namespace Bschmitt\Amqp\Support\Testing\Fakes;

use Bschmitt\Amqp\Consumer;
use Closure;
use Illuminate\Contracts\Config\Repository;
use PhpAmqpLib\Message\AMQPMessage;

class ConsumerFake extends Consumer
{

    private $iterator = 0;

    public function __construct(private array $messagesToConsume)
    {

    }

    public function consume(string $queue, Closure $closure): bool
    {
        $closure($this->messagesToConsume[$this->iterator], $this);
    }

    public function acknowledge(AMQPMessage $message)
    {
        $this->iterator++;
    }

    public function reject(AMQPMessage $message, bool $requeue = false)
    {

    }

}
