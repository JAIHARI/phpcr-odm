<?php

namespace Doctrine\Tests\ODM\PHPCR\Functional\Versioning;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;

/**
 * @PHPCRODM\Document(versionable="simple")
 */
class SimpleVersionTestObj
{
    /** @PHPCRODM\Id */
    public $id;
    /** @PHPCRODM\Node */
    public $node;

    /** @PHPCRODM\VersionName */
    public $versionName;

    /** @PHPCRODM\VersionCreated */
    public $versionCreated;

    /** @PHPCRODM\Field(type="string") */
    public $username;
    /** @PHPCRODM\Field(type="long", multivalue=true) */
    public $numbers;

    /** @PHPCRODM\ReferenceOne(strategy="weak") */
    public $reference;
}

class SimpleVersioningTest extends VersioningTestAbstract
{
    public function setUp()
    {
        $this->typeVersion = SimpleVersionTestObj::class;
        parent::setUp();
    }
}
