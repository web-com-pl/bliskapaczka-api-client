<?php

namespace Bliskapaczka\ApiClient\Enum;

/**
 * DeliveryType  v2
 *
 * @author Radosław Barteczko
 * @link https://api-docs.bliskapaczka.pl/#operators-v2
 */
final class DeliveryTypeEnum
{

    /** Shipment from drop off to destination point. */
    const P2P = 'P2P';

    /** Shipment from sender address to destination point. */
    const D2P = 'D2P';

    /** Shipment from drop off point to receiver address. */
    const P2D = 'P2D';

    /** Shipment from sender to receiver address. */
    const D2D = 'D2D';

}
