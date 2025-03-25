<?php

namespace Hiberus\Munoz\Plugin;

class MyPlugin
{

    /**
     * @param $subject
     * @param $mark
     * @return float
     */
    public function afterGetMark($subject, $mark)
    {
        if ($mark) {
            $mark = ((float) $mark < 5) ? 4.9 : $mark;
        }

        return $mark;
    }
}