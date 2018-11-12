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
    | Popup Title
    |--------------------------------------------------------------------------
    |
    | This is the text that will appear below the logo in the feedback popup
    |
    */

    'title' => 'Help us improve our website',

    /*
    |--------------------------------------------------------------------------
    | Success Message
    |--------------------------------------------------------------------------
    |
    | This message will be displayed if the feedback message is correctly sent.
    |
    */

    'successMessage' => 'Thank you for your feedback!',

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
     */

    'feedbacks' => [
        'like' => [
            'title' => 'I like something',
            'icon' => '/vendor/kustomer/assets/like.svg',
            'label' => 'What did you like ?',
        ],
        'dislike' => [
            'title' => 'I don\'t like something',
            'icon' => '/vendor/kustomer/assets/dislike.svg',
            'label' => 'What did you dislike ?',
        ],
        'suggestion' => [
            'title' => 'I have a suggestion',
            'icon' => '/vendor/kustomer/assets/idea.svg',
            'label' => 'What is your suggestion ?',
        ],
        // 'bug' => [
        //     'title' => 'I found a bug',
        //     'icon' => '/vendor/kustomer/assets/bug.svg',
        //     'label' => 'Please explain what happened',
        // ],
    ],
];
