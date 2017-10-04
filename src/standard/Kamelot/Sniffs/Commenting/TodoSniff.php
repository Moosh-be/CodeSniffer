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

namespace Standards\Sniffs\Comments;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Tokens;

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

class TodoSniff implements Sniff
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
        return Tokens::$commentTokens;

    }//end register()


    /**
     * Processes this sniff, when one of its tokens is encountered.
     *
     * @param File  $phpcsFile The file being scanned.
     * @param int   $stackPtr  The position of the current token in the stack passed in $tokens.
     *
     * @return int
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $foundComments = [];
        $stackEnable = false;
        $blockCommentStack = [];
        foreach($tokens as $token) {
            $code = $token['code'];
            $line = $token['line'];
            $content = $token['content'];

            //search inline comment
            if ($code === T_COMMENT && !$stackEnable) {
                $foundComments[$line] = $content;
            }


            //search block comments
            if ($code === T_DOC_COMMENT_OPEN_TAG) {
                $stackEnable = true;
                continue;
            }

            if ($code === T_DOC_COMMENT_CLOSE_TAG) {
                $foundComments[$line] = join('', $blockCommentStack);
                $blockCommentStack = [];
                $stackEnable = false;
            }

            if ($stackEnable) {
                $blockCommentStack[] = $content;
            }
        }

        foreach ($foundComments as $lineNumber => $foundComment) {
            $this->handleComment($phpcsFile, $lineNumber - 1, $foundComment);
        }

        return count($tokens) + 1;
    }

    private function handleComment(File $phpcsFile, $lineNumber, $foundComment)
    {
        if (preg_match('/(?:\A|[^\p{L}]+)todo([^\p{L}]+(.*)|\Z)/ui', $foundComment, $matches)) {
            if (! preg_match('/WWW([a-z])*-([0-9])*/ui', $matches[1], $jiramatches)) {
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

                $phpcsFile->addWarning($error, $lineNumber, $type, $data);
            }
        }

    }
}//end class
