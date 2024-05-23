# sirmerdas/ip-helper

### Just a real simple package which helps you to work with different versions of ips.

#### Requirements:

- `php ^ 8.0`
- `phpunit/phpunit": ">=11.1"`

# Installation

Run this composer code
`$ composer require sirmerdas/ip-helper`

### Basic Usage

```php
use Sirmerdas\IpHelper\IpTools;

include "vendor/autoload.php";


print_r(IpTools::getClientIpInfo()); // [[address] => ::1,[version] => 6]
```

---

##### Get given ip address version

```php
echo IpTools::getIpVersion("::1"); // 6
```

##### Check if given ip is version 4

```php
var_dump(IpTools::verifyIpV4("::1")); // false
```

##### Check if given ip is version 6

```php
var_dump(IpTools::verifyIpV6("::1")); // true
```

##### Generate a random ip version 4

```php
echo IpTools::fakeIpV4(); // 127.0.0.1
```

##### Generate a random ip version 6

```php
echo IpTools::fakeIpV6(); // ::1
```

# License

- This package is This package is created and modified under the MIT License.
