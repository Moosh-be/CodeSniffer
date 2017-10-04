<?php
/**
 * Tests for the \PHP_CodeSniffer\Files\File:getMethodParameters method.
 *
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @copyright 2006-2015 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 */

namespace PHP_CodeSniffer\Tests\Core\File;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Ruleset;
use PHP_CodeSniffer\Files\DummyFile;
use PHPUnit\Framework\TestCase;

class TodoSniffTest extends TestCase
{

    /**
     * @var \PHP_CodeSniffer\Files\File
     */
    private $phpcsFile;
    /**
     * @var Config
     */
    private $config;
    /**
     * @var Ruleset
     */
    private $ruleset;

    public function setUp()
    {
        $this->config            = new Config();
        $this->config->standards = ['./src/standard/Kamelot/ruleset.xml'];

        $this->ruleset = new Ruleset($this->config);
    }

    public function tearDown()
    {
        unset($this->phpcsFile);
    }


    public function testErrors()
    {

        $pathToTestFile  = __DIR__ . DIRECTORY_SEPARATOR . 'errors' . DIRECTORY_SEPARATOR . 'comments.php';

        $this->phpcsFile = new DummyFile(file_get_contents($pathToTestFile), $this->ruleset, $this->config);
        $this->phpcsFile->process();

        self::assertEquals(7, $this->phpcsFile->getWarningCount());
        self::assertArrayHasKey(1, $this->phpcsFile->getWarnings());
        //the document has in fact 9 errors. The issue it the second to do in a bloc comment
        //The numbering of lines is invalid also
    }

    public function testValids()
    {
        $pathToTestFile  = __DIR__ . DIRECTORY_SEPARATOR . 'ok' . DIRECTORY_SEPARATOR . 'comments.php';

        $this->phpcsFile = new DummyFile(file_get_contents($pathToTestFile), $this->ruleset, $this->config);
        $this->phpcsFile->process();

        self::assertEquals(0, $this->phpcsFile->getWarningCount());
    }
}//end class
