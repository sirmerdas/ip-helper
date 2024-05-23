<?php

namespace Sirmerdas\IpHelper;

class IpTools
{

    const IP_V4 = 4;
    const IP_V6 = 6;


    /**
     * Get client ip address and version
     * 
     * @return array
     */
    public static function getClientIpInfo(): array
    {
        return [
            "address" => $_SERVER['REMOTE_ADDR'],
            "version" => self::getIpVersion($_SERVER['REMOTE_ADDR'])
        ];
    }


    /**
     * Get ip version
     * 
     * @param string $ipAddress
     * 
     * @return int
     */
    public static function getIpVersion(string $ipAddress): int|bool
    {
        if (self::verifyIpV4($ipAddress)) {
            return self::IP_V4;
        } elseif (self::verifyIpV6($ipAddress)) {
            return self::IP_V6;
        } else {
            return false;
        }
    }


    /**
     * Check if given Ip address is version 4
     * 
     * @param string $ipAddress
     * 
     * @return bool
     */
    public static function verifyIpV4(string $ipAddress): bool
    {
        return filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }


    /**
     * Check if given Ip address is version 6
     * @param string $ipAddress
     * 
     * @return bool
     */
    public static function verifyIpV6(string $ipAddress): bool
    {
        return filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }

    /**
     * Generate a random ip version 4
     * 
     * @return string
     */
    public static function fakeIpV4(): string
    {
        do {
            $firstOctet = mt_rand(1, 255);
            $secondOctet = mt_rand(0, 255);
            $thirdOctet = mt_rand(0, 255);
            $fourthOctet = mt_rand(0, 255);


            $fullIpAddress = "$firstOctet.$secondOctet.$thirdOctet.$fourthOctet";
        } while (!self::verifyIpV4($fullIpAddress));

        return $fullIpAddress;
    }


    /**
     * Generate a random ip version 6
     * 
     * @return string
     */
    public static function fakeIpV6(): string
    {
        do {
            $groups = [];
            for ($i = 0; $i < 8; $i++) {
                $groups[] = dechex(mt_rand(0, 0xFFFF));
            }

            $fullIpAddress = implode(":", $groups);
        } while (!self::verifyIpV6($fullIpAddress));

        return $fullIpAddress;
    }
}
