<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Users\Model\Channel\Enum;

use Object\Traits\EnumTrait;
use Object_Enum_LocAttribute;

enum GroupChannelTypes: string
{
    use EnumTrait;

    #[Object_Enum_LocAttribute('NF.Form.Main', 'Main')]
    case Main = 'UM::MAIN';

    #[Object_Enum_LocAttribute('NF.Form.CC', 'CC')]
    case CC = 'UM::CC';

    #[Object_Enum_LocAttribute('NF.Form.Bcc', 'Bcc')]
    case Bcc = 'UM::BCC';

    #[Object_Enum_LocAttribute('NF.Form.Receipt', 'Receipt')]
    case Receipt = 'UM::RECEIPT';

    #[Object_Enum_LocAttribute('NF.Form.Subgroup', 'Subgroup')]
    case Subgroup = 'UM::SUBGROUP';
}
