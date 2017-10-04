<?php
/**
 * Generic_Sniffs_Commenting_TodoSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Based on Generic_Sniffs_Commenting_TodoSniff.
 *
 * Warns about TO DO comments.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

use PHP_CodeSniffer\Sniffs\Sniff;

class Kamelot_Sniffs_Commenting_TodoSniff implements Sniff
{

    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
                                   'PHP',
                                   'JS',
                                  );


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return PHP_CodeSniffer_Tokens::$commentTokens;

    }//end register()


    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $content = $tokens[$stackPtr]['content'];
        $matches = array();
        // @Todo pouvoir personaliser la regexp
        preg_match('/(?:\A|[^\p{L}]+)todo([^\p{L}]+(.*)|\Z)/ui', $content, $matches);
        if (empty($matches) === false) {

            preg_match('/WWW([a-z])*-([0-9])*/ui', $matches[1], $jiramatches);
            if (empty($jiramatches) === false) {

            } else {

            // Clear whitespace and some common characters not required at
            // the end of a to-do message to make the warning more informative.

                $type        = 'CommentFound';
                $todoMessage = trim($matches[1]);
                $todoMessage = trim($todoMessage, '-:[](). ');
                $error       = "Ajoutez l'id du ticket jira lié à ce TODO ";
                $data        = array($todoMessage);
                if ($todoMessage !== '') {
                    $type   = 'TaskFound';
                    $error .= ' "%s"';
                }

                $phpcsFile->addWarning($error, $stackPtr, $type, $data);
            }
        }

    }//end process()
}//end class
