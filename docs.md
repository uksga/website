## Software
-   The project is built using Symfony, and the main set of documentation can be found here: [Documentation](https://symfony.com/doc/current/setup.html)

	-   Setting up an existing project: [Link](https://symfony.com/doc/current/setup.html#setting-up-an-existing-symfony-project)
	- `php bin/console about` will describe the project
	- To run the site locally: `php bin/console server:run`
	- `yarn run compile:sass` will, shockingly, compile scss into css
	- `yarn run build:css` will build CSS for production
	- All the scripts are defined in package.json, so refer to that for any others
- Models are defined in `src/Entity/`
- Controllers are defined in `src/Controller/`
- Views are defined in `templates/`
	- The template engine we are using is [Twig](https://twig.symfony.com/)

### Database
First, create the database: `php bin/console doctrine:database:create`

Then, seed the database: `php bin/console doctrine:schema:update --force`