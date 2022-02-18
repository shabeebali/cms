# Diff Details

Date : 2022-02-18 09:15:59

Directory c:\Users\shabe\Documents\Laravel Projects\cms\app

Total : 88 files,  -1265 codes, -117 comments, -254 blanks, all -1636 lines

[summary](results.md) / [details](details.md) / [diff summary](diff.md) / diff details

## Files
| filename | language | code | comment | blank | total |
| :--- | :--- | ---: | ---: | ---: | ---: |
| [app/Console/Kernel.php](/app/Console/Kernel.php) | PHP | 15 | 12 | 6 | 33 |
| [app/Exceptions/Handler.php](/app/Exceptions/Handler.php) | PHP | 19 | 17 | 6 | 42 |
| [app/Http/Controllers/Auth/AuthenticatedSessionController.php](/app/Http/Controllers/Auth/AuthenticatedSessionController.php) | PHP | 27 | 17 | 11 | 55 |
| [app/Http/Controllers/Auth/ConfirmablePasswordController.php](/app/Http/Controllers/Auth/ConfirmablePasswordController.php) | PHP | 27 | 11 | 7 | 45 |
| [app/Http/Controllers/Auth/EmailVerificationNotificationController.php](/app/Http/Controllers/Auth/EmailVerificationNotificationController.php) | PHP | 16 | 6 | 6 | 28 |
| [app/Http/Controllers/Auth/EmailVerificationPromptController.php](/app/Http/Controllers/Auth/EmailVerificationPromptController.php) | PHP | 14 | 6 | 4 | 24 |
| [app/Http/Controllers/Auth/NewPasswordController.php](/app/Http/Controllers/Auth/NewPasswordController.php) | PHP | 38 | 20 | 8 | 66 |
| [app/Http/Controllers/Auth/PasswordResetLinkController.php](/app/Http/Controllers/Auth/PasswordResetLinkController.php) | PHP | 25 | 16 | 7 | 48 |
| [app/Http/Controllers/Auth/RegisteredUserController.php](/app/Http/Controllers/Auth/RegisteredUserController.php) | PHP | 33 | 13 | 9 | 55 |
| [app/Http/Controllers/Auth/VerifyEmailController.php](/app/Http/Controllers/Auth/VerifyEmailController.php) | PHP | 19 | 6 | 6 | 31 |
| [app/Http/Controllers/Controller.php](/app/Http/Controllers/Controller.php) | PHP | 10 | 0 | 4 | 14 |
| [app/Http/Kernel.php](/app/Http/Kernel.php) | PHP | 39 | 22 | 7 | 68 |
| [app/Http/Middleware/Authenticate.php](/app/Http/Middleware/Authenticate.php) | PHP | 16 | 6 | 4 | 26 |
| [app/Http/Middleware/EncryptCookies.php](/app/Http/Middleware/EncryptCookies.php) | PHP | 8 | 6 | 4 | 18 |
| [app/Http/Middleware/PreventRequestsDuringMaintenance.php](/app/Http/Middleware/PreventRequestsDuringMaintenance.php) | PHP | 8 | 6 | 4 | 18 |
| [app/Http/Middleware/RedirectIfAuthenticated.php](/app/Http/Middleware/RedirectIfAuthenticated.php) | PHP | 22 | 8 | 6 | 36 |
| [app/Http/Middleware/TrimStrings.php](/app/Http/Middleware/TrimStrings.php) | PHP | 11 | 5 | 4 | 20 |
| [app/Http/Middleware/TrustHosts.php](/app/Http/Middleware/TrustHosts.php) | PHP | 12 | 5 | 4 | 21 |
| [app/Http/Middleware/TrustProxies.php](/app/Http/Middleware/TrustProxies.php) | PHP | 14 | 10 | 5 | 29 |
| [app/Http/Middleware/VerifyCsrfToken.php](/app/Http/Middleware/VerifyCsrfToken.php) | PHP | 8 | 6 | 4 | 18 |
| [app/Http/Requests/Auth/LoginRequest.php](/app/Http/Requests/Auth/LoginRequest.php) | PHP | 51 | 29 | 14 | 94 |
| [app/Models/User.php](/app/Models/User.php) | PHP | 23 | 15 | 7 | 45 |
| [app/Providers/AppServiceProvider.php](/app/Providers/AppServiceProvider.php) | PHP | 12 | 12 | 5 | 29 |
| [app/Providers/AuthServiceProvider.php](/app/Providers/AuthServiceProvider.php) | PHP | 13 | 12 | 6 | 31 |
| [app/Providers/BroadcastServiceProvider.php](/app/Providers/BroadcastServiceProvider.php) | PHP | 12 | 5 | 5 | 22 |
| [app/Providers/EventServiceProvider.php](/app/Providers/EventServiceProvider.php) | PHP | 17 | 11 | 5 | 33 |
| [app/Providers/RouteServiceProvider.php](/app/Providers/RouteServiceProvider.php) | PHP | 30 | 25 | 9 | 64 |
| [app/View/Components/AppLayout.php](/app/View/Components/AppLayout.php) | PHP | 16 | 5 | 4 | 25 |
| [app/View/Components/FrontendLayout.php](/app/View/Components/FrontendLayout.php) | PHP | 25 | 5 | 4 | 34 |
| [app/View/Components/GuestAdminLayout.php](/app/View/Components/GuestAdminLayout.php) | PHP | 13 | 11 | 5 | 29 |
| [app/View/Components/GuestLayout.php](/app/View/Components/GuestLayout.php) | PHP | 10 | 5 | 4 | 19 |
| [app/View/Components/ViewBusinessImmigrationForm.php](/app/View/Components/ViewBusinessImmigrationForm.php) | PHP | 15 | 10 | 5 | 30 |
| [app/View/Components/ViewSkilledWorkerForm.php](/app/View/Components/ViewSkilledWorkerForm.php) | PHP | 15 | 10 | 5 | 30 |
| [packages/Comasy/Admin/composer.json](/packages/Comasy/Admin/composer.json) | JSON | -19 | 0 | -1 | -20 |
| [packages/Comasy/Admin/src/Http/Controllers/AdminController.php](/packages/Comasy/Admin/src/Http/Controllers/AdminController.php) | PHP | -15 | 0 | -4 | -19 |
| [packages/Comasy/Admin/src/Http/Controllers/AuthController.php](/packages/Comasy/Admin/src/Http/Controllers/AuthController.php) | PHP | -47 | -12 | -14 | -73 |
| [packages/Comasy/Admin/src/Http/Controllers/Controller.php](/packages/Comasy/Admin/src/Http/Controllers/Controller.php) | PHP | -10 | 0 | -4 | -14 |
| [packages/Comasy/Admin/src/Models/Admin.php](/packages/Comasy/Admin/src/Models/Admin.php) | PHP | -20 | -10 | -6 | -36 |
| [packages/Comasy/Admin/src/Providers/AdminServiceProvider.php](/packages/Comasy/Admin/src/Providers/AdminServiceProvider.php) | PHP | -21 | 0 | -5 | -26 |
| [packages/Comasy/Admin/src/Services/MenuPresenter.php](/packages/Comasy/Admin/src/Services/MenuPresenter.php) | PHP | -44 | -18 | -9 | -71 |
| [packages/Comasy/Admin/src/database/migrations/2022_02_03_124622_create_admins_table.php](/packages/Comasy/Admin/src/database/migrations/2022_02_03_124622_create_admins_table.php) | PHP | -23 | -10 | -4 | -37 |
| [packages/Comasy/Admin/src/resources/views/login.blade.php](/packages/Comasy/Admin/src/resources/views/login.blade.php) | PHP | 0 | 0 | -1 | -1 |
| [packages/Comasy/Admin/src/routes/web.php](/packages/Comasy/Admin/src/routes/web.php) | PHP | -21 | 0 | -3 | -24 |
| [packages/Comasy/Core/composer.json](/packages/Comasy/Core/composer.json) | JSON | -19 | 0 | -1 | -20 |
| [packages/Comasy/Core/src/Models/Setting.php](/packages/Comasy/Core/src/Models/Setting.php) | PHP | -12 | 0 | -4 | -16 |
| [packages/Comasy/Core/src/Providers/CoreServiceProvider.php](/packages/Comasy/Core/src/Providers/CoreServiceProvider.php) | PHP | -21 | 0 | -6 | -27 |
| [packages/Comasy/Core/src/Providers/RouteServiceProvider.php](/packages/Comasy/Core/src/Providers/RouteServiceProvider.php) | PHP | -25 | -18 | -7 | -50 |
| [packages/Comasy/Core/src/database/migrations/2022_02_16_025950_create_settings_table.php](/packages/Comasy/Core/src/database/migrations/2022_02_16_025950_create_settings_table.php) | PHP | -22 | -10 | -4 | -36 |
| [packages/Comasy/Core/src/routes/admin.php](/packages/Comasy/Core/src/routes/admin.php) | PHP | -32 | -1 | -4 | -37 |
| [packages/Comasy/Core/vendor/autoload.php](/packages/Comasy/Core/vendor/autoload.php) | PHP | -3 | -1 | -4 | -8 |
| [packages/Comasy/Core/vendor/composer/ClassLoader.php](/packages/Comasy/Core/vendor/composer/ClassLoader.php) | PHP | -276 | -153 | -53 | -482 |
| [packages/Comasy/Core/vendor/composer/autoload_classmap.php](/packages/Comasy/Core/vendor/composer/autoload_classmap.php) | PHP | -6 | -1 | -4 | -11 |
| [packages/Comasy/Core/vendor/composer/autoload_namespaces.php](/packages/Comasy/Core/vendor/composer/autoload_namespaces.php) | PHP | -5 | -1 | -4 | -10 |
| [packages/Comasy/Core/vendor/composer/autoload_psr4.php](/packages/Comasy/Core/vendor/composer/autoload_psr4.php) | PHP | -6 | -1 | -4 | -11 |
| [packages/Comasy/Core/vendor/composer/autoload_real.php](/packages/Comasy/Core/vendor/composer/autoload_real.php) | PHP | -41 | -4 | -13 | -58 |
| [packages/Comasy/Core/vendor/composer/autoload_static.php](/packages/Comasy/Core/vendor/composer/autoload_static.php) | PHP | -28 | -1 | -8 | -37 |
| [packages/Comasy/Core/vendor/composer/platform_check.php](/packages/Comasy/Core/vendor/composer/platform_check.php) | PHP | -21 | -1 | -5 | -27 |
| [packages/Comasy/Just2Canada/src/Http/Controllers/BusinessImmigrationController.php](/packages/Comasy/Just2Canada/src/Http/Controllers/BusinessImmigrationController.php) | PHP | -338 | -29 | -123 | -490 |
| [packages/Comasy/Just2Canada/src/Http/Controllers/Controller.php](/packages/Comasy/Just2Canada/src/Http/Controllers/Controller.php) | PHP | -10 | 0 | -4 | -14 |
| [packages/Comasy/Just2Canada/src/Models/ApplicationForm.php](/packages/Comasy/Just2Canada/src/Models/ApplicationForm.php) | PHP | -17 | 0 | -7 | -24 |
| [packages/Comasy/Just2Canada/src/Models/BusinessImmigration.php](/packages/Comasy/Just2Canada/src/Models/BusinessImmigration.php) | PHP | -210 | 0 | -14 | -224 |
| [packages/Comasy/Just2Canada/src/Models/Country.php](/packages/Comasy/Just2Canada/src/Models/Country.php) | PHP | -8 | 0 | -4 | -12 |
| [packages/Comasy/Just2Canada/src/Providers/J2CServiceProvider.php](/packages/Comasy/Just2Canada/src/Providers/J2CServiceProvider.php) | PHP | -21 | 0 | -7 | -28 |
| [packages/Comasy/Just2Canada/src/Providers/RouteServiceProvider.php](/packages/Comasy/Just2Canada/src/Providers/RouteServiceProvider.php) | PHP | -28 | -18 | -7 | -53 |
| [packages/Comasy/Just2Canada/src/database/migrations/2021_12_26_040239_create_countries_table.php](/packages/Comasy/Just2Canada/src/database/migrations/2021_12_26_040239_create_countries_table.php) | PHP | -21 | -10 | -4 | -35 |
| [packages/Comasy/Just2Canada/src/database/migrations/2022_01_03_122104_create_application_forms_table.php](/packages/Comasy/Just2Canada/src/database/migrations/2022_01_03_122104_create_application_forms_table.php) | PHP | -22 | -10 | -4 | -36 |
| [packages/Comasy/Just2Canada/src/database/migrations/2022_01_06_150030_create_business_immigrations_table.php](/packages/Comasy/Just2Canada/src/database/migrations/2022_01_06_150030_create_business_immigrations_table.php) | PHP | -61 | -10 | -4 | -75 |
| [packages/Comasy/Just2Canada/src/routes/admin.php](/packages/Comasy/Just2Canada/src/routes/admin.php) | PHP | -13 | 0 | -3 | -16 |
| [packages/Comasy/Just2Canada/src/routes/web.php](/packages/Comasy/Just2Canada/src/routes/web.php) | PHP | -23 | 0 | -3 | -26 |
| [packages/Comasy/Menu/src/Http/Controllers/Controller.php](/packages/Comasy/Menu/src/Http/Controllers/Controller.php) | PHP | -10 | 0 | -4 | -14 |
| [packages/Comasy/Menu/src/Http/Controllers/MenuController.php](/packages/Comasy/Menu/src/Http/Controllers/MenuController.php) | PHP | -64 | -43 | -11 | -118 |
| [packages/Comasy/Menu/src/Models/Menu.php](/packages/Comasy/Menu/src/Models/Menu.php) | PHP | -13 | 0 | -5 | -18 |
| [packages/Comasy/Menu/src/Models/MenuItem.php](/packages/Comasy/Menu/src/Models/MenuItem.php) | PHP | -9 | 0 | -4 | -13 |
| [packages/Comasy/Menu/src/Providers/MenuServiceProvider.php](/packages/Comasy/Menu/src/Providers/MenuServiceProvider.php) | PHP | -21 | 0 | -7 | -28 |
| [packages/Comasy/Menu/src/Providers/RouteServiceProvider.php](/packages/Comasy/Menu/src/Providers/RouteServiceProvider.php) | PHP | -28 | -18 | -8 | -54 |
| [packages/Comasy/Menu/src/database/migrations/2022_02_14_023517_create_menus_table.php](/packages/Comasy/Menu/src/database/migrations/2022_02_14_023517_create_menus_table.php) | PHP | -21 | -10 | -4 | -35 |
| [packages/Comasy/Menu/src/database/migrations/2022_02_14_023531_create_menu_items_table.php](/packages/Comasy/Menu/src/database/migrations/2022_02_14_023531_create_menu_items_table.php) | PHP | -27 | -10 | -4 | -41 |
| [packages/Comasy/Menu/src/routes/admin.php](/packages/Comasy/Menu/src/routes/admin.php) | PHP | -6 | 0 | -3 | -9 |
| [packages/Comasy/Menu/src/routes/web.php](/packages/Comasy/Menu/src/routes/web.php) | PHP | 0 | 0 | -1 | -1 |
| [packages/Comasy/Page/composer.json](/packages/Comasy/Page/composer.json) | JSON | -25 | 0 | 0 | -25 |
| [packages/Comasy/Page/src/Http/Controllers/Controller.php](/packages/Comasy/Page/src/Http/Controllers/Controller.php) | PHP | -10 | 0 | -4 | -14 |
| [packages/Comasy/Page/src/Http/Controllers/PageController.php](/packages/Comasy/Page/src/Http/Controllers/PageController.php) | PHP | -63 | -42 | -10 | -115 |
| [packages/Comasy/Page/src/Models/CmsPage.php](/packages/Comasy/Page/src/Models/CmsPage.php) | PHP | -9 | 0 | -4 | -13 |
| [packages/Comasy/Page/src/Providers/PageServiceProvider.php](/packages/Comasy/Page/src/Providers/PageServiceProvider.php) | PHP | -22 | 0 | -7 | -29 |
| [packages/Comasy/Page/src/Providers/RouteServiceProvider.php](/packages/Comasy/Page/src/Providers/RouteServiceProvider.php) | PHP | -28 | -18 | -8 | -54 |
| [packages/Comasy/Page/src/database/migrations/2022_01_30_065713_create_cms_pages_table.php](/packages/Comasy/Page/src/database/migrations/2022_01_30_065713_create_cms_pages_table.php) | PHP | -27 | -10 | -4 | -41 |
| [packages/Comasy/Page/src/routes/admin.php](/packages/Comasy/Page/src/routes/admin.php) | PHP | -6 | 0 | -3 | -9 |
| [packages/Comasy/Page/src/routes/web.php](/packages/Comasy/Page/src/routes/web.php) | PHP | 0 | 0 | -1 | -1 |

[summary](results.md) / [details](details.md) / [diff summary](diff.md) / diff details