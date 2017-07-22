<?php

return [
    '<action:(login|logout)>' => 'site/<action>',
    '<action:(about)>' => 'static-page/<action>',
    'service/Cheap-Hotels-Deal' => 'service/hotel',
    'corporate-account' => 'service/corporate-account',
    '<controller:(request)>' => '<action:(hotel)>',
    '<controller:(blog|travel-tips)>/page/<page:\d+>' => '<controller>/list',
    '<controller:(blog|travel-tips)>' => '<controller>/list',
    '<controller:(continent|country|city|airline|blog|travel-tips)>/<alias:[0-9a-zA-Z_\-]+>' => '<controller>/index',
    'adminarea' => 'admin/home/index',
    'adminarea/<controller:(blog|continent|country|city|airline|testimonials|travel-tips)>' => 'admin/<controller>/index',
    'adminarea/<controller:(blog|continent|country|city|airline|testimonials|travel-tips)>/<action:(create)>' => 'admin/<controller>/<action>',
    'adminarea/<controller:(blog|continent|country|city|airline|testimonials|travel-tips)>/<action:(edit|delete)>/<id:\d+>' => 'admin/<controller>/<action>',
    'adminarea/travel-tips/<id:\d+>/<action:(travel-tips-attactions|create-travel-tips-attaction)>' => 'admin/travel-tips/<action>',
    'adminarea/travel-tips/<id:\d+>/<action:(edit-travel-tips-attaction|delete-travel-tips-attaction)>/<travel_tip_attaction_id:\d+>' => 'admin/travel-tips/<action>',
    //'adminarea/<controller:(xml-data)>/<action:(blog|continent|country|city|airline|image)>' => 'admin/<controller>/<action>',
];