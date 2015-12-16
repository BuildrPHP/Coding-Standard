<?php namespace Example\SayHello\Output;

use Example\SayHello\Transformer\TransformerInterface;

/**
 * Define common transformation tasks
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
interface TransformableInterface {

    /**
     * Set a transformer.
     *
     * @param \Example\SayHello\Transformer\TransformerInterface $transformer
     */
    public function setTransformer(TransformerInterface $transformer);

    /**
     * Return the current transformer, or NULL if no transformer set.
     *
     * @return \Example\SayHello\Transformer\TransformerInterface|NULL
     */
    public function getTransformer();

    /**
     * Determines that the current Output has any transformer.
     *
     * @return bool
     */
    public function hasTransformer();

}
