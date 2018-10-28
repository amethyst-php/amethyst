# Create your package

A package has been created to speed-up the development. Install the package globally.

    composer global require railken/amethyst-skeleton
    
If this is your first global composer package, you have to add the composer path

    export PATH=$PATH:$HOME/.composer/vendor/bin
    
Now you can execute the command 

    amethyst new <my-package>

Go inside the package

    cd <my-package>
    
Create a new data

    amethyst data <my-package> <my-data>
    
Copy the .env.example and configure it

    cp .env.example .env
    
Install all vendors packages
    
    composer update
    
Launch the tests

    ./vendor/bin/phpunit
