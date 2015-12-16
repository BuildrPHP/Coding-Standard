<?php namespace Example\SayHello\Output;

/**
 * Define common output tasks.
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
interface OutputInterface {

    /**
     * Write the output
     *
     * @param string $input The input value
     *
     * @return mixed
     */
    public function output($input);

}
