<?php namespace Example\SayHello\Output;

use Example\SayHello\Transformer\TransformerInterface;

/**
 * Common trait that used in various transformable outputs.
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
trait TransformableTrait {

    /**
     * @inheritdoc
     */
    protected $transformer;

    public function setTransformer(TransformerInterface $transformer) {
        $this->transformer = $transformer;
    }

    /**
     * @inheritdoc
     */
    public function getTransformer() {
        return $this->transformer;
    }

    /**
     * @inheritdoc
     */
    public function hasTransformer() {
        if($this->transformer instanceof TransformerInterface) {
            return TRUE;
        }

        return FALSE;
    }

}
