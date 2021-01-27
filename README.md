# relationship-data-transfer-object

[![Latest Version on Packagist](https://img.shields.io/packagist/v/grixu/relationship-data-transfer-object.svg?style=flat-square)](https://packagist.org/packages/grixu/relationship-data-transfer-object)

Simple class for wrapping data with relationships. But without those meta-data when dump DTO to Array

## Installation

You can install the package via composer:

```bash
composer require grixu/relationship-data-transfer-object
```

## Usage

``` php
class YourDto extends RelationshipDataTransferObject
{
    // go forward as with normal DTO from spatie/data-transfer-object
    public string $some;
}

// Let's create one DTO object
$dto = new YourDto([
    'some' => 'data',
    'relationships' => [
        [
            'localModel' => Model::class,
            'foreignModel' => ForeignModel::class,
            'localKey' => 'fk',
            'foreignKey' => 'id',
            'type' => BelongsTo::class,
            'pivot' => [
                'field' => 'extra data'
            ]
        ],
        ...
    ]);

// When you dump DTO to aaray it wouldn't contain relationships field
$dto->toArray();

// But you can still access those data
$dto->relationships;
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email mg@grixu.dev instead of using the issue tracker.

## Credits

- [Mateusz Gostański](https://github.com/grixu)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
