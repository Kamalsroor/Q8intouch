<?php

if (!function_exists('active')) {
    function active($route = null, $action = null)
    {
        if (request()->segment(1) == $route) {
            if ($action != null) {
                if (request()->segment(2) == $action) {
                    return 'active';
                } else {
                    return '';
                }
            }
            if (!request()->segment(2)) {
                return 'active';
            }
        } else {
            return '';
        }
    }
}





if (!function_exists('gender')) {
    function gender($input = null)
    {
        $output = [
            'male' => __('Male'),
            'female' => __('Female'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}


if (!function_exists('social_status')) {
    function social_status($input = null)
    {
        $output = [
            'single' => __('Single'),
            'married' => __('Married'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}


if (!function_exists('appetite')) {
    function appetite($input = null)
    {
        $output = [
            'good' => __('Good'),
            'very_good' => __('Very Good'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}


if (!function_exists('appointment_status')) {
    function appointment_status($input = null)
    {
        $output = [
            null => __('Status'),
            'new' => __('New'),
            'followup' => __('Follow Up'),
            'done' => __('Done'),
            'cancel' => __('Cancel'),
        ];
        return is_null($input) ? $output : $output[$input];
    }
}


