<?php

namespace Bschmitt\Amqp\Facades;

use Bschmitt\Amqp\Support\Testing\Fakes\AmqpFake;
use Bschmitt\Amqp\Support\Testing\Fakes\AMQPMessageFake;
use Illuminate\Support\Facades\Facade;

/**
 * @author Björn Schmitt <code@bjoern.io>
 * @see Bschmitt\Amqp\Amqp
 *
 * @method static void shouldReceiveMessage(AMQPMessageFake $messageFake)
 */
class Amqp extends Facade
{

    public static function fake()
    {
        static::swap($fake = new AmqpFake());

        return $fake;
    }

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Amqp';
    }
}
