# Users package for the Oxygen CMS. Includes Permissions and Roles.

# TODOs
* review the socialite implementation
* add the social missing login controllers or remove the functionality from the package.

## Changes
### `v1.0` - Support of Laravel `6.x`
* `PermissionTableSeeder::resourcePermissions()` - fixed usage deprecated helpers
* refactor return & use statements
* restrict required PHP version `7.0 - 7.3`
* add the `HasUploads` for backward compatibility
