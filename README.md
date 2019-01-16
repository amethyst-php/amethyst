Amethyst
-

The purpose of this project is to create a collection of packages to standardize and facilitate the developing process of common problems when building the backend of a general purpose project.

Usually when you're building an application, the type of project influences the choice you will make: Building a crm? Searching for an open-source crm. Building a blog? Searching for an open-source blog. Building an e-commerce? Well, you can guess it. The problem with this is that each project will start from a different base, making difficult to maintain all of them. Do you want to add a cool package that can be extremly usefull for all your projects? Cool, but now you have to create controllers, tests, validators in different ways because each of your project use different logics and solve the problem differently.

The solution? Start building packages that solve only one problem, and create your project as it was a puzzle.

## The Project

Each solution has his own package. The user has his own package, the authentication has his own package, the registration, the notification and so on; all fully configurabile. 
Do you have your own authentication? Good! Continue to use it and skip that package. 
Do you want to add some extra fields to the package of the customer? No problem at all, all packages permits that.

Most of the packages are data oriented, their objective is to store some data that your project might need, such as [customer](https://github.com/railken/amethyst-customer), [product](https://github.com/railken/amethyst-product), [supplier](https://github.com/railken/amethyst-supplier), [category](https://github.com/railken/amethyst-category) etc... Other packages are more utility oriented, their objective is to make your job easier such as the [email-sender](https://github.com/railken/amethyst-email-sender), [file-generator](https://github.com/railken/amethyst-file-generator), [exporter](https://github.com/railken/amethyst-exporter), [importer](https://github.com/railken/amethyst-importer), [ftp](https://github.com/railken/amethyst-ftp)...

At first, all of these packages can give you an headache, i mean, you want something simple to install, without worring to much, i feel you, really. So don't worry, there is a [starter](https://github.com/search?l=PHP&q=amethyst-starter&type=Repositories) for that: with a bunch of packages added and already installed you can start to test all the features within minutes.

All the packages are laravel-based, the most of them provides full configurable api.

These packages provide only the backend with a sets of endpoints, so a frontend it's still required.

## Documentation

One of the command of [Tool](https://github.com/railken/cli-amethyst) give the ability to generate automatically the documentation of the given data and is currently wip.
Example of result: [link](https://github.com/railken/amethyst-foo/blob/master/docs/data/foo/index.md)

## Contribution

If you wish to create your own package you can use this [Tool](https://github.com/railken/amethyst-skeleton)

## Links

* [Starters](https://github.com/topics/amethyst-starter)
* [Packages](https://github.com/topics/amethyst-package)
* [Tool](https://github.com/railken/cli-amethyst)

## Status

This is currently WIP
