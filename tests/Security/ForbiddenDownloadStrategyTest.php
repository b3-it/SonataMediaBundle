<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\MediaBundle\Tests\Security;

use PHPUnit\Framework\TestCase;
use Sonata\MediaBundle\Model\MediaInterface;
use Sonata\MediaBundle\Security\ForbiddenDownloadStrategy;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Translation\TranslatorInterface;

class ForbiddenDownloadStrategyTest extends TestCase
{
    public function testIsGranted(): void
    {
        $media = $this->createStub(MediaInterface::class);
        $request = $this->createStub(Request::class);
        $translator = $this->createStub(TranslatorInterface::class);

        $strategy = new ForbiddenDownloadStrategy($translator);
        self::assertFalse($strategy->isGranted($media, $request));
    }
}
