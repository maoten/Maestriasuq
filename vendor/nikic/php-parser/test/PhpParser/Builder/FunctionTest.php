<?php

namespace PhpParser\Builder;

use PhpParser\Comment;
use PhpParser\Node;
use PhpParser\Node\Expr\Print_;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Stmt;

class FunctionTest extends \PHPUnit_Framework_TestCase
{

    public function createFunctionBuilder($name)
    {
        return new Function_($name);
    }


    public function testReturnByRef()
    {
        $node = $this->createFunctionBuilder('test')->makeReturnByRef()->getNode();

        $this->assertEquals(new Stmt\Function_('test', [
            'byRef' => true
        ]), $node);
    }


    public function testParams()
    {
        $param1 = new Node\Param('test1');
        $param2 = new Node\Param('test2');
        $param3 = new Node\Param('test3');

        $node = $this->createFunctionBuilder('test')->addParam($param1)->addParams([ $param2, $param3 ])->getNode();

        $this->assertEquals(new Stmt\Function_('test', [
            'params' => [ $param1, $param2, $param3 ]
        ]), $node);
    }


    public function testStmts()
    {
        $stmt1 = new Print_(new String_('test1'));
        $stmt2 = new Print_(new String_('test2'));
        $stmt3 = new Print_(new String_('test3'));

        $node = $this->createFunctionBuilder('test')->addStmt($stmt1)->addStmts([ $stmt2, $stmt3 ])->getNode();

        $this->assertEquals(new Stmt\Function_('test', [
            'stmts' => [ $stmt1, $stmt2, $stmt3 ]
        ]), $node);
    }


    public function testDocComment()
    {
        $node = $this->createFunctionBuilder('test')->setDocComment('/** Test */')->getNode();

        $this->assertEquals(new Stmt\Function_('test', [ ], [
            'comments' => [ new Comment\Doc('/** Test */') ]
        ]), $node);
    }


    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Expected parameter node, got "Name"
     */
    public function testInvalidParamError()
    {
        $this->createFunctionBuilder('test')->addParam(new Node\Name('foo'));
    }
}
