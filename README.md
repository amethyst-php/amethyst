This is currently WIP
-

The purpose of this project is to create a collection of packages to standardize and facilitate the developing process of common problems when building the backend of a general purpose project.

Each solution has his own package. The user has his own package, the authentication has his own package, the registration, the notification and so on; all fully configurabile. 
Do you have your own authentication? Good! Continue to use it and skip that package. 
Do you want to add some extra fields to the package of the customer? No problem at all, all packages permits that.

Most of the packages are data oriented, their objective is to store some data that your project might need, such as [customer](https://github.com/railken/amethyst-customer), [product](https://github.com/railken/amethyst-product), [supplier](https://github.com/railken/amethyst-supplier), [category](https://github.com/railken/amethyst-category) etc... Other packages are more utility oriented, their objective is to make your job easier such as the [email-sender](https://github.com/railken/amethyst-email-sender), [file-generator](https://github.com/railken/amethyst-file-generator), [exporter](https://github.com/railken/amethyst-exporter), [importer](https://github.com/railken/amethyst-importer), [ftp](https://github.com/railken/amethyst-ftp)...

At first, all of these packages can give you an headache, i mean, you want something simple to install, without worring to much, i feel you, really. So don't worry, there is a [starter](docs/starters.md#base-starter) for that: with a bunch of packages added and already installed you can start to test all the features within seconds.

All the packages are laravel-based, the most of them provides full configurable api.

These packages provide only the backend with a sets of endpoints, so a frontend it's still required.

## Links

* [Starters](docs/starters.md)
* [Packages](docs/packages.md)
* [Create your package](docs/skeleton.md)
