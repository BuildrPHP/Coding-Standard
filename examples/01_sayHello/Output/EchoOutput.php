<?php namespace Example\SayHello\Output;

use Example\SayHello\Output\OutputInterface;
use Example\SayHello\Output\TransformableInterface;
use Example\SayHello\Output\TransformableTrait;

/**
 * echo() based output class
 *
 * sayHello - Say hello in a complicated way
 *
 * @author zolli07@gmail.com <Zoltán Borsos>
 * @author john.doe@host.com <John Doe>
 * @package Example
 * @subpackage Output
 *
 * @copyright    Copyright 2015, <Zoltán Borsos>.
 * @license      https://github.com/author/package/license.md
 * @link         https://github.com/author/package
 *
 * @codeCoverageIgnore
 * @codingStandardIgnore
 */
class EchoOutput implements OutputInterface, TransformableInterface {

    use TransformableTrait;

    /**
     * @inheritDoc
     */
    public function output($input) {
        echo $input;
    }

}
