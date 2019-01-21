<?php

/*
 * Copyright (C) 2019 Asport Group
 * All Rights Reserved
 */

namespace Bliskapaczka\ApiClient\Enum;

/**
 * Order tracking status
 *
 * @author Radosław Barteczko
 * @link https://api-docs.bliskapaczka.pl/#_get_tracking
 */
final class OrderTrackingStatusEnum
{
    const SAVED = 'SAVED';
    
    const PAYMENT_CONFIRMED = 'PAYMENT_CONFIRMED';
    
    const PROCESSING = 'PROCESSING';
    
    const ADVISING = 'ADVISING';
    
    const READY_TO_SEND = 'READY_TO_SEND';
    
    const POSTED = 'POSTED';
    
    const ON_THE_WAY = 'ON_THE_WAY';
    
    const DELIVERED = 'DELIVERED';
    
    const ERROR = 'ERROR';
    
    /** After POST /v2/order/$number/cancel */
    const MARKED_FOR_CANCELLATION = 'MARKED_FOR_CANCELLATION';
}
