<?php namespace Example\SayHello\Transformer;

use Example\SayHello\Transformer\TransformerInterface;

/**
 * Transform given strings to UPPER-case.
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
class CaseTransformer implements TransformerInterface {

    const CASE_TRANSFORM_UPPER = 1;

    const CASE_TRANSFORM_LOWER = 2;

    /**
     * Current transformation method
     *
     * @type int
     */
    private $transformationMethod = 0;

    /**
     * @inheritDoc
     */
    public function transform($input) {
        $value = '';

        switch($this->transformationMethod) {
            case 1:
                $value = strtoupper($input);

                break;
            case 2:
                $value = strtolower($input);

                break;
            default:
                $value = $input;

                break;
        }

        return $value;
    }

    /**
     * Set the transformation mode. Use this class CASE_TRANSFORM_* constants.
     *
     * @param int $type
     */
    public function setTransformationMethod($type) {
        $this->transformationMethod = $type;
    }

}
