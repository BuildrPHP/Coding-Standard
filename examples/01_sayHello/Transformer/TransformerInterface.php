<?php namespace Example\SayHello\Transformer;

/**
 * Common interface for various transformers
 *
 * sayHello - Say hello in a complicated way
 *
 * @author zolli07@gmail.com <Zoltán Borsos>
 * @author john.doe@host.com <John Doe>
 * @package Example
 * @subpackage Transformer
 *
 * @copyright    Copyright 2015, <Zoltán Borsos>.
 * @license      https://github.com/author/package/license.md
 * @link         https://github.com/author/package
 */
interface TransformerInterface {

    /**
     * Transform the string with the transformer definition.
     *
     * @param string $input The input string
     *
     * @return string
     */
    public function transform($input);

}
