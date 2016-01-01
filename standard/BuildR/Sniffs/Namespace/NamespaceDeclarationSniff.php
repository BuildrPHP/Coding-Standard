<?php

/**
 * BuildR_Sniffs_Namespace_NamespaceDeclarationSniff.
 *
 * Checks that namespace declaration has the correct placing (After the opening tag).
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Zoltán Borsos <zolli07@gmail.com>
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   1.0.0
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class BuildR_Sniffs_Namespace_NamespaceDeclarationSniff implements PHP_CodeSniffer_Sniff {

    public function register() {
        return [
            T_NAMESPACE,
        ];
    }

    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr) {
        $tokens = $phpcsFile->getTokens();

        $namespaceDefinition = $tokens[$stackPtr];
        $openingTagPos = $phpcsFile->findPrevious([T_OPEN_TAG], $stackPtr);

        if($namespaceDefinition['line'] !== $tokens[$openingTagPos]['line']) {
            $error = 'The namespace must be on the same line as the PHP opening tag!';
            $phpcsFile->addError($error, $stackPtr, 'nonInlineNamespace');
        }
    }

}
