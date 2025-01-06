<?php

namespace App\Services;

class Logic
{
    public static function weightedStrings($s, $queries)
    {
        $weights = [];
        $length = strlen($s);

        for ($i = 0; $i < $length; $i++) {
            $currentWeight = ord($s[$i]) - ord('a') + 1;
            $weights[] = $currentWeight;

            $repeatWeight = $currentWeight;
            for ($j = $i + 1; $j < $length && $s[$j] === $s[$i]; $j++) {
                $repeatWeight += $currentWeight;
                $weights[] = $repeatWeight;
            }
        }

        $result = [];
        foreach ($queries as $query) {
            $result[] = in_array($query, $weights) ? "Yes" : "No";
        }

        return $result;
    }

    public static function balancedBrackets($s)
    {
        $stack = [];
        $brackets = ['(' => ')', '{' => '}', '[' => ']'];

        foreach (str_split($s) as $char) {
            if (isset($brackets[$char])) {
                $stack[] = $char;
            } elseif (in_array($char, $brackets)) {
                if (empty($stack) || $brackets[array_pop($stack)] !== $char) {
                    return "NO";
                }
            }
        }

        return empty($stack) ? "YES" : "NO";
    }

    public static function highestPalindrome($s, $k)
    {
        $len = strlen($s);
        $s = str_split($s);
        $changes = array_fill(0, $len, false);

        for ($i = 0; $i < floor($len / 2); $i++) {
            $j = $len - $i - 1;
            if ($s[$i] !== $s[$j]) {
                $max = max($s[$i], $s[$j]);
                $s[$i] = $s[$j] = $max;
                $changes[$i] = $changes[$j] = true;
                $k--;
            }
        }

        if ($k < 0) return "-1";

        for ($i = 0; $i < floor($len / 2); $i++) {
            $j = $len - $i - 1;
            if ($s[$i] !== '9' && $k >= 1 + (int)!$changes[$i]) {
                $s[$i] = $s[$j] = '9';
                $k -= 1 + (int)!$changes[$i];
            }
        }

        if ($len % 2 !== 0 && $k > 0) {
            $s[floor($len / 2)] = '9';
        }

        return implode('', $s);
    }
}
