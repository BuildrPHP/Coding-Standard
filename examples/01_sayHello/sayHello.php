<?php namespace Example\SayHello;

use Example\SayHello\Input\InputInterface;
use Example\SayHello\Output\OutputInterface;
use Example\SayHello\Output\TransformableInterface;

/**
 * sayHello class. This class only made for this example and it not has
 * any, real purposes.
 *
 * sayHello - Say hello in a complicated way
 *
 * @author zolli07@gmail.com <Zoltán Borsos>
 * @author john.doe@host.com <John Doe>
 * @package Example
 *
 * @copyright    Copyright 2015, <Zoltán Borsos>.
 * @license      https://github.com/author/package/license.md
 * @link         https://github.com/author/package
 *
 * @codeCoverageIgnore
 * @codingStandardIgnore
 */
class sayHello {

    /**
     * @type \Example\SayHello\Input\InputInterface
     */
    private $input;

    /**
     * @type \Example\SayHello\Output\OutputInterface
     */
    private $output;

    /**
     * sayHello constructor
     *
     * @param \Example\SayHello\Input\InputInterface $input
     * @param \Example\SayHello\Output\OutputInterface $output
     */
    public function __construct(InputInterface $input, OutputInterface $output) {
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * Run the sayHello application
     */
    public function run() {
        $inputValue = $this->input->getValue();

        if($this->output instanceof TransformableInterface && $this->output->hasTransformer()) {
            $inputValue = $this->output->getTransformer()->transform($inputValue);
        }

        $this->output->output($inputValue);
    }

}
