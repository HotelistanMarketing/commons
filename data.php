<?php

namespace Lead;

enum Language: string
{
    case Arabic = 'Arabic';
    case English = 'English';
    case French = 'French';
    case German = 'German';
    case Italian = 'İtalian';
    case Spanish = 'Spanish';
    case Swedish = 'Swedish';
    case Turkish = 'Türkçe';
}

enum Interest: string
{
    case Aesthetics = 'Aesthetics';
    case Dental = 'Dental';
}

enum Procedure: string
{
    case BBL = 'BBL';
    case Breast_Augmentations = 'Breast Augmentations';
    case Implant = 'Implant';
    case Liposuction = 'Liposuction';
    case Rhinoplasty = 'Rhinoplasty';
    case Tummy_Tuck = 'Tummy Tuck';
}
