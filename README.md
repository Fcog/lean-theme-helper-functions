# Helper Functions for the Lean Theme

## Testing Installation
Install PHPUnit

Run the following to create a DB for tests
```bash
bin/install-wp-tests.sh <db-name> <db-user> <db-pass> [db-host] [wp-version] [skip-database-creation]
```

##  Testing
```bash
phpunit
```

## PHP Linter Installation
```bash
composer install
```

## PHP Linter
```bash
composer lint
```