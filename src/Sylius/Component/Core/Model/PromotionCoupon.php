<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Component\Core\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Promotion\Model\PromotionCoupon as BasePromotionCoupon;

class PromotionCoupon extends BasePromotionCoupon implements PromotionCouponInterface
{
    protected ?int $perCustomerUsageLimit = null;

    protected bool $reusableFromCancelledOrders = true;

    /**
     * @var Collection|OrderInterface[]
     *
     * @psalm-var Collection<array-key, OrderInterface>
     */
    protected Collection $orders;

    public function __construct()
    {
        /** @var ArrayCollection<array-key, OrderInterface> $this->orders */
        $this->orders = new ArrayCollection();
    }

    public function getPerCustomerUsageLimit(): ?int
    {
        return $this->perCustomerUsageLimit;
    }

    public function setPerCustomerUsageLimit(?int $perCustomerUsageLimit): void
    {
        $this->perCustomerUsageLimit = $perCustomerUsageLimit;
    }

    public function isReusableFromCancelledOrders(): bool
    {
        return $this->reusableFromCancelledOrders;
    }

    public function setReusableFromCancelledOrders(bool $reusableFromCancelledOrders): void
    {
        $this->reusableFromCancelledOrders = $reusableFromCancelledOrders;
    }
}
