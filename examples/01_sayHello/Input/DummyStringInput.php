<?php namespace Example\SayHello\Input;

use Example\SayHello\Input\InputInterface;

/**
 * Dummy input class
 *
 * sayHello - Say hello in a complicated way
 *
 * @author zolli07@gmail.com <Zoltán Borsos>
 * @author john.doe@host.com <John Doe>
 * @package Example
 * @subpackage Input
 *
 * @copyright    Copyright 2015, <Zoltán Borsos>.
 * @license      https://github.com/author/package/license.md
 * @link         https://github.com/author/package
 *
 * @codeCoverageIgnore
 * @codingStandardIgnore
 */
class DummyStringInput implements InputInterface {

    /**
     * @inheritDoc
     */
    public function getValue() {
        return 'Hello World';
    }

}
