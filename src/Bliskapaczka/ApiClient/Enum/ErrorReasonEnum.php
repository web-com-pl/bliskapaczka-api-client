<?php

namespace Bliskapaczka\ApiClient\Enum;

/**
 * ErrorReason v2
 *
 * @author Radosław Barteczko
 * @link https://api-docs.bliskapaczka.pl/#operators-v2
 */
final class ErrorReasonEnum
{

    /** Chosen destination point is invalid */
    const INVALID_DESTINATION_POINT = 'INVALID_DESTINATION_POINT';

    /** Chosen posting point is invalid */
    const INVALID_POSTING_POINT = 'INVALID_POSTING_POINT';

    /** Chosen destination point is invalid */
    const OPERATOR_VALIDATION_ERROR = 'OPERATOR_VALIDATION_ERROR';

    /** Something went wrong on the operator side and we were not able to distinguish what */
    const GENERIC_ADVICE_ERROR = 'GENERIC_ADVICE_ERROR';

    /** Wrong own agreement credentials were used for the order */
    const AUTHORIZATION_ERROR = 'AUTHORIZATION_ERROR';

    /** Generating waybill failed */
    const LABEL_GENERATION_ERROR = 'LABEL_GENERATION_ERROR';

    /** Processing of the waybill failed */
    const WAYBILL_PROCESS_ERROR = 'WAYBILL_PROCESS_ERROR';

    /** Something went terribly wrong on our side */
    const BACKEND_ERROR = 'BACKEND_ERROR';

}
