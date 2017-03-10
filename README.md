# StringMapperBundle

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.0-8892BF.svg)](https://php.net/)

## To use this bundle, you need to create new service:

### For Mapper with Default:

        mapper.test_default:
            class: "%msales.string_mapper.default.class%" #storm is lost withot it :(
            parent: msales.string_mapper.default
            arguments:
                -
                    ala: makota
                    kot: madoscali

Default mapper will return requested key if its not found in the map.

### For Whitelisting Mapper:

        mapper.test_whitelisting:
            class: "%msales.string_mapper.whitelisting.class%" #storm is lost withot it :(
            parent: msales.string_mapper.whitelisting
            arguments:
                -
                    ala: makota
                    kot: madoscali

Whitelisting mapper will throw exception if requested key is not in map.

## License

StringMapperBundle is released under the MIT Licence. See the bundled LICENSE file for details.
