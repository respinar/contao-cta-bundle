<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend("cta_legend", "protected_legend", PaletteManipulator::POSITION_BEFORE)
    ->addField([ "ctaText", "ctaDisabled", "ctaUrl", "ctaTitle"], "cta_legend", PaletteManipulator::POSITION_APPEND)
    ->applyToPalette("regular", "tl_page")
    ->applyToPalette('root', 'tl_page')
    ->applyToPalette('rootfallback', 'tl_page');

// Define fields
$GLOBALS["TL_DCA"]["tl_page"]["fields"]["ctaDisabled"] = [
    "exclude" => true,
    "inputType" => "checkbox",
    "eval" => ["tl_class" => "w50 m12"],
    "sql" => ['type' => 'boolean', 'default' => false],
];

$GLOBALS["TL_DCA"]["tl_page"]["fields"]["ctaTitle"] = [
    "exclude" => true,
    "inputType" => "text",
    "eval" => ["maxlength" => 255, "tl_class" => "w50"],
    "sql" => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS["TL_DCA"]["tl_page"]["fields"]["ctaUrl"] = [
    "exclude" => true,
    "inputType" => "text",
    "eval" => ['rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>2048, 'dcaPicker'=>true, 'tl_class'=>'w50 clr'],
    "sql" => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS["TL_DCA"]["tl_page"]["fields"]["ctaText"] = [
    "exclude" => true,
    "inputType" => "text",
    "eval" => ["maxlength" => 255, "tl_class" => "w50"],
    "sql" => ['type' => 'string', 'length' => 255, 'default' => ''],
];
