<?php
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2015 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


namespace Eccube\Repository;

use Eccube\Entity\DeliveryFee;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * DelivFeeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 */
class DeliveryFeeRepository extends AbstractRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DeliveryFee::class);
    }

    /**
     * 都道府県と配送業者から配送料を検索します.
     *
     * 検索条件に該当するデータ配送料が存在しない場合は、
     * 新たなインスタンスを生成して返す.
     *
     * @param array $conditions Pref 及び Delivery を含んだ検索条件の配列
     * @return \Eccube\Entity\DeliveryFee 配送料オブジェクト
     */
    public function findOrCreate(array $conditions)
    {
        $DeliveryFee = $this->findOneBy($conditions);

        if ($DeliveryFee instanceof \Eccube\Entity\DeliveryFee) {
            return $DeliveryFee;
        }

        $DeliveryFee = new \Eccube\Entity\DeliveryFee();
        $DeliveryFee
            ->setPref($conditions['Pref'])
            ->setDelivery($conditions['Delivery'])
        ;

        return $DeliveryFee;
    }
}
