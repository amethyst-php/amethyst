# Create your package

A package has been created to speed-up the development. Install the package globally.

    composer global require railken/amethyst-skeleton
    
If this is your first global composer package, you have to add the composer path

    export PATH=$PATH:$HOME/.composer/vendor/bin
    
Now you can execute the command 

    amethyst <name>
    
Go inside the folder, update the .env and install all vendors packages
    
    cd <name>
    cp .env.example .env
    composer update
    
Launch the tests

    ./vendor/bin/phpunit
