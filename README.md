Certainly! Here's an updated version of the README file template for your `esimcard-php-sdk` project:

---

# eSIM Card PHP SDK

![Build Status](http://img.shields.io/travis/{username}/{repo}.svg?style=flat)
![PHP Version](https://img.shields.io/packagist/php-v/{username}/{repo}.svg)
![License](https://img.shields.io/packagist/l/{username}/{repo}.svg)
![Latest Stable Version](https://img.shields.io/packagist/v/{username}/{repo}.svg)
![Total Downloads](https://img.shields.io/packagist/dt/{username}/{repo}.svg)

## Introduction

The eSIM Card PHP SDK provides a convenient way to integrate eSIM functionality into PHP applications. It allows you to manage eSIM profiles, perform activation, and handle eSIM lifecycle events through a simple and intuitive API.

## Features

- **Packages View**: View available eSIM packages.
- **Pricing View**: Retrieve pricing information for eSIM services.
- **My Bundles**: Manage your purchased eSIM bundles.
- **Buy eSIM**: Purchase eSIM profiles through the SDK.
- **eSIM Details**: Fetch details of specific eSIM profiles.

## Installation

You can install the SDK via Composer:

```bash
composer require esimcard/esimcard-sdk
```

## Usage

### Initialize the SDK

```php
require_once 'vendor/autoload.php';

use Esimcard\EsimcardSdk\EsimCard;

$token = 'get token from portal'
$client = new EsimCard($token);
```

### Example: Get an eSIM Pricing

```php
try {
    $pricing = $client->pricing();
    print_r($pricing);
} catch (\Exception $e) {
    echo "Failed to create eSIM profile: " . $e->getMessage();
}
```

### Documentation

For detailed usage instructions, please refer to the [Documentation](docs/).

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This SDK is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Support

For support or inquiries, please contact us at support@esimcard.com.

---

Feel free to further customize the sections and details based on your specific SDK functionalities and documentation needs.