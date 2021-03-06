<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusCmsPlugin\Factory;

use BitBag\SyliusCmsPlugin\Entity\BlockInterface;
use BitBag\SyliusCmsPlugin\Factory\BlockFactory;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Resource\Factory\FactoryInterface;

final class BlockFactorySpec extends ObjectBehavior
{
    function let(FactoryInterface $resourceFactory): void
    {
        $this->beConstructedWith($resourceFactory);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(BlockFactory::class);
    }

    function it_creates_new_block(
        FactoryInterface $resourceFactory,
        BlockInterface $block
    ): void
    {
        $resourceFactory->createNew()->willReturn($block);

        $this->createNew()->shouldBeEqualTo($block);
    }

    function it_creates_new_block_with_type(
        FactoryInterface $resourceFactory,
        BlockInterface $block
    ): void
    {
        $resourceFactory->createNew()->willReturn($block);
        $block->setType('image')->shouldBeCalled();

        $this->createWithType('image')->shouldBeEqualTo($block);
    }
}
