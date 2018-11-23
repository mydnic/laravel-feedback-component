<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Kustomer Feedback Icon
    |--------------------------------------------------------------------------
    |
    | This is the path to the image that appears in the fixed bubble on your
    | layout page. You can change this to use your own image.
    | This is an absolute path that points to your public directory.
    |
    */

    'icon' => '/vendor/kustomer/assets/icon.svg',

    /*
    |--------------------------------------------------------------------------
    | Close Icon
    |--------------------------------------------------------------------------
    |
    | This is the path to the image that appears in the bubble when the kustomer
    | popup is open. Clicking this image will close the popup.
    |
     */

    'close' => '/vendor/kustomer/assets/close.svg',

    /*
    |--------------------------------------------------------------------------
    | Application Logo
    |--------------------------------------------------------------------------
    |
    | This is the path to the image that appears in the header of the popup
    | when the feedback popup is open. By default a dummy image is displayed
    | You can override this path to your own logo.
    |
    */

    'logo' => '/vendor/kustomer/assets/logo.svg',

    /*
    |--------------------------------------------------------------------------
    | Colors
    |--------------------------------------------------------------------------
    |
    | An array of colors that will be used to style the feedback components.
    | The primary color will be used for the floating bubble background
    | as well as for the text title in the popup header.
    |
     */

    'colors' => [
        'primary' => 'rgb(222, 48, 42)',
    ],

    /*
    |--------------------------------------------------------------------------
    | Feedback Types
    |--------------------------------------------------------------------------
    |
    | Here you can specify the "questions" and feedbacks types that your
    | visitors will be able to choose inside the feedback popup.
    | You can add and remove as many as you like. However, we think
    | three feedback types is enough and don't supercharge the popup.
    |
    | Each keys (eg. "like", "dislike", etc.) will be the feedback "type"
    | and will be save into your database under the "type" column.
    | This allows you to filter through feedback types.
    |
    | Only Icons of the feedbacks are defined here. For the texts themselves,
    | you need to update the translation file in *lang/vendor/en/kustomer.php*
    |
     */

    'feedbacks' => [
        'like' => [
            'icon' => '/vendor/kustomer/assets/like.svg',
        ],
        'dislike' => [
            'icon' => '/vendor/kustomer/assets/dislike.svg',
        ],
        'suggestion' => [
            'icon' => '/vendor/kustomer/assets/idea.svg',
        ],
        // 'bug' => [
        //     'icon' => '/vendor/kustomer/assets/bug.svg',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attach Browser Screenshot
    |--------------------------------------------------------------------------
    |
    | If you set this to true, a screenshot of the page will be captured using
    | https://html2canvas.hertzen.com/ and will be sent with the feedback request
    | The image will be stored in a "screenshots" folder. Make sure your filesystem
    | is configured as we will use Laravel Storage facade.
    |
     */

    'screenshot' => false,
];
