<?php

use Myth\Auth\Authentication\Passwords\CompositionValidator;

class CompositionValidatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CompositionValidator
     */
    protected $validator;

    public function setUp()
    {
        parent::setUp();

        $config = new \Myth\Auth\Config\Auth();
        $config->minimumPasswordLength = 8;

        $this->validator = new CompositionValidator();
        $this->validator->setConfig($config);
    }

    public function testCheckFalse()
    {
        $password = '1234';

        $this->assertFalse($this->validator->check($password));
    }

    public function testCheckTrue()
    {
        $password = '1234567890';

        $this->assertTrue($this->validator->check($password));
    }
}
