<?php
return array(
    // set your paypal credential
    'client_id' => 'ASAwhrQF13TVcKgDSEvrzYUBcd597cyKcM5H1wsgncL26AoW4ji21aZWhbsjMzZ1TdX5QrMfyLPfC8XE',
    'secret'    => 'ENVQ1NyELHljgaxgvNgE5-BkbSinAsm6wQ4KAcMrN41JvdLejEaeEdGOOjwgL27QaWcUrwEsF7rZh4dJ',
    /**
     * SDK configuration
     */
    'settings'  => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode'                   => 'sandbox',
        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 30,
        /**
         * Whether want to log to a file
         */
        'log.LogEnabled'         => true,
        /**
         * Specify the file that want to write on
         */
        'log.FileName'           => storage_path() . '/logs/paypal.log',
        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel'           => 'FINE',

    ),
);
