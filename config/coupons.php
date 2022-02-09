<?php

return [

    /*
     * Database table name that will be used in migration
     */
    'table' => 'coupons',

    /*
     * Database table name for voucherable models
     */
    'voucherable_table' => 'voucherables',

    /*
     * List of characters that will be used for coupon code generation.
     */
    'characters' => '23456789ABCDEFGHJKLMNPQRSTUVWXYZ',

    /*
     * Coupon code prefix.
     *
     * Example: foo
     * Generated Code: foo-AGXF-1NH8
     */
    'prefix' => "TUC",

    /*
     * Coupon code suffix.
     *
     * Example: foo
     * Generated Code: AGXF-1NH8-foo
     */
    'suffix' => null,

    /*
     * Code mask.
     * All asterisks will be removed by random characters.
     */
    'mask' => '****-****',

    /*
     * Separator to be used between prefix, code and suffix.
     */
    'separator' => '-',
];