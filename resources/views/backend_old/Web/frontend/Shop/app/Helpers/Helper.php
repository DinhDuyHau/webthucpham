<?php

function getconfig($configkey)
{
    $setting = \App\Models\Setting::where('config_key', $configkey)->first();
    if (!empty($setting))
        return $setting->config_value;
    else
        return null;
}
