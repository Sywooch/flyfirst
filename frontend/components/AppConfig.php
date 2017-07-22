<?php

namespace app\components;

abstract class AppConfig
{
    /* img params */
    const Image_ContentType_BlogArticle = 1;
    const Image_ContentField_BlogArticle = 1;

    const Image_ContentType_Continent = 3;
    const Image_ContentField_Continent = 3;

    const Image_ContentType_Country = 4;
    const Image_ContentField_Country = 4;

    const Image_ContentType_City = 5;
    const Image_ContentField_City = 5;

    const Image_ContentType_Airline = 6;
    const Image_ContentField_Airline = 6;

    const Image_ContentType_TravelTips = 7;
    const Image_ContentField_TravelTips = 7;

    const Image_ContentType_TravelTipsAttactions = 8;
    const Image_ContentField_TravelTipsAttactions = 8;

    const Image_ContentType_Testimonials = 9;
    const Image_ContentField_Testimonials = 9;

    /*cabin class*/
    const Cabin_Class_Business = 1;
    const Cabin_Class_First = 2;

    const Message_DuplicateAlias = "Alias already exists.";
}