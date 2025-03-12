<?php

declare(strict_types=1);

$GLOBALS["TL_DCA"]["tl_module"]["palettes"]["calltoaction"] = '
    {title_legend},name,type;
    {whatsapp_legend},ctaText,ctaUrl,ctaTitle;
    {template_legend:hide},cssID,customTpl;
    {protected_legend:hide},protected;
';

$GLOBALS["TL_DCA"]["tl_module"]["fields"]["ctaTitle"] = [
    "inputType" => "text",
    "eval" => ["mandatory" => true, "maxlength" => 255, "tl_class" => "w50"],
    "sql" => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS["TL_DCA"]["tl_module"]["fields"]["ctaUrl"] = [
    "inputType" => "text",
    "eval" => ['mandatory'=>true, 'rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>2048, 'dcaPicker'=>true, 'tl_class'=>'w50 clr'],
    "sql" => ['type' => 'string', 'length' => 255, 'default' => ''],
];

$GLOBALS["TL_DCA"]["tl_module"]["fields"]["ctaText"] = [
    "inputType" => "text",
    "eval" => ["mandatory" => true, "maxlength" => 255, "tl_class" => "w50"],
    "sql" => ['type' => 'string', 'length' => 255, 'default' => ''],
];