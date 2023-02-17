# fenzi-dog-sports


- [Purpose](#purpose)
- [Codebase](#codebase)
- [Pantheon](#pantheon)
- [External resources](#external-resources)
- [Local dev setup using Lando](#local-dev-setup-using-lando)
    - [(Step 1) Install Lando and Docker Desktop](#step-1-install-lando-and-docker-desktop)
    - [(Step 2) Git clone the repo](#step-2-git-clone-the-repo)
    - [(Step 3) Configure /etc/hosts](#step-3-configure-etchosts)
    - [(Step 4) Lando start](#step-4-lando-start)
    - [(Step 5) Lando pull](#step-5-lando-pull)
- [Github Actions Overview](#github-actions-overview)

    
[![Github Actions](https://github.com/HelloWorldDevs/fenzi-dog-sports/actions/workflows/build_deploy_and_test.yml/badge.svg)](https://github.com/HelloWorldDevs/fenzi-dog-sports/actions/workflows/build_deploy_and_test.yml)
[![Dashboard fenzi-dog-sports](https://img.shields.io/badge/dashboard-fenzi_dog_sports-yellow.svg)](https://dashboard.pantheon.io/sites/108fa515-ecff-49b8-a996-4996cf40a040#dev/code)
[![Dev Site fenzi-dog-sports](https://img.shields.io/badge/site-fenzi_dog_sports-blue.svg)](http://dev-fenzi-dog-sports.pantheonsite.io/)

# Purpose

Wordpress website for fenzi dog sports acadamy

# Codebase

The site is hosted on Pantheon. Out of the box Pantheon provides its own Git repo but it has a very limited UI, so we prefer GitHub.
NOTE:   GITHUB contains the primary code (and configuratino setup via composer.json) for this site.

What this practically means is, all deploys (including plugin updates) will need to be initiated from github.   This can be done by opening a PR against master as you would for any other code.     When that PR is merged, github actions will use composer to rebuild our ENV and deploy it to pantheon automatically.

# External resources

* Confluence: https://helloworlddevs.atlassian.net/jira/software/c/projects/FDLD/pages
* Slack channels:   `#private-fdsa`
* Pantheon dashboard: https://dashboard.pantheon.io/sites/108fa515-ecff-49b8-a996-4996cf40a040#dev/code
* Pantheon environments:
    * Dev: https://dev-fenzi-dog-sports.pantheonsite.io/

# Local dev setup using Lando

## (Step 1) Install Lando and Docker Desktop

Follow the recommended instructions for installing Lando if you haven't already. Docker Desktop will be installed as well.

https://docs.lando.dev/basics/installation.html#macos


## (Step 2) Git clone the repo

`git clone` the GitHub repo into whichever directory you prefer.

`git clone git@github.com:HelloWorldDevs/fenzi-dog-sports.git`

`cd` into the repo/project root.

## (Step 3) Configure /etc/hosts

Edit `/etc/hosts` on your local machine. Add this line:

```
127.0.0.1				fenzi-dog-sports.lando/
```

Normally Lando will create site URLs in the format *.lndo.site. Because of the proxy settings we have in `.lando.yml`, those won’t be created. Instead we’ll have this nicer URL, but the trade off is we have to add it to our `/etc/hosts` file.

## (Step 4) Composer Install and Lando start

NOTE:  If you see failing results due to composer issues, check the following 2 items:
1) `Composer dependencies:`  Delete the composer.lock file.   The run `lando composer update --lock` to generate a new
2) `GitHub API limit (0 calls/hr) is exhausted,` If prompted for a GitHub PAT (Personal Access Token), this should resolve your install problem
   1) Unclear why this is sometimes needed at this time!  
3) Finally, there are 3 plugins that "may" require a "Y" to proceed and install.   They are:  `example-wordpress-composer`, `phpcodesniffer-composer-installer`, `wordpress-core-installer`

Run:
```
lando start
```

The first time you run this it will take a while. Eventually you’ll be given some URLs to access the site, however they will not work yet
because we haven’t pulled the database yet. Lando attempts to create URLs based on the
available ports on your machine.

The URLs that will be most reliable/consistent will be https://fenzi-dog-sports.lando or http://fenzi-dog-sports.lando, however you may find that they are instead https://fenzi-dog-sports.lando:444/ or http://fenzi-dog-sports.lando:8000/.

Make note of whatever URLs you’re given so we can try them later.

## (Step 5) Lando pull

Run:

```
lando pull
```

* You'll be asked whether/where you want to pull code, database and files from. You can select "none" for anything you want to skip.
    * Choose "dev" for database.
    * Choose "dev" for files.

# WEBPACK - JS and SCSS
NOTE:  At this time, compiled CSS and JS will be checked into the repository.
Future builds will automatically build via github actions.  But at this time, there is a permission
issue inside the docker container that is preventing the action from succeeding.

Webpack will handle watching and recompiling scss and js assets
* All JS should reside in:  `web/wp-content/plugins/fenzi-hwd-store/includes/src/js`
* All SCSS should reside in:  `web/wp-content/plugins/fenzi-hwd-store/includes/src/scss`

To launch a local web server to watch your files and automatically recompile/reduce into the appropriate css/js, run this command
`npm run start:webdev`
* NOTE:   This setup will monitor for changes and will deploy sourcemaps and console.logs in the JS.   

To launch/test the production build, run this command:
`npm run build:webprod`
* NOTE:   This setup will only build minimized assets.  It will also remove console.logs and unused functions in the JS.

# Pushing a new branch

To push a new branch, follow this format:

```
git push -u github FDSA-[ticket-number]
```

# Plugin Updates

If you want a new plugin installed, open a PR like you would for any other code.   The route will depend if it’s a public or private plugin)

* Public:  Use wpackagist and add it to our composer file.    Not git controlled, but still a part of our repo.
* Private (paid plugin):   Install it directly in the plugins director and ignore that plugin to our .gitignore file so that it gets tracked via github:

Additional notes:
In `.gitignore`, see section "# Plugins NOT under composer control"


NOTE:  For this project, we are only using wpackagist for WP core and Theme updates

To install a supported new plugin, find the package on wordpress https://wordpress.org/

```
https://wordpress.org/plugins/<PLUGIN NAME>/
```
`(ie, https://wordpress.org/plugins/advanced-custom-fields/` for advance-custom-fields)

Verify the package exists on wpackagist in the search (ie: advance-custom-fields )

https://wpackagist.org/

Add to composer.json file as `require`

```
"require": {
  ...
  "wpackagist-plugin/advanced-custom-fields": "5.9.*",
```

# Github Actions Overview
All deploys to pantheon are done via github actions.   The following workflows already exist in this repo:
1) Multidev:  build-deploy:   
   1) Start a branch with `multidev`.    Upon push to github, a multidev site will get spun up with this configruation
   2) Merge a PR into `master`.   Upon successful merge, build will be sent to the development (dev) pantheon

NOTE:  Reminder that all build steps are off latest composer.lock.   If you make a composer.json update, make sure you check in an updated composer.lock file as well

# E2E setup/reference

Gutenberg tests are used with Gutenberg blocks.   So you can write tests which utilize and integrate any Gutenberg block.
Inside Wordpress core:   Minimized versions of Gutenberg block are released in the WP core version here.

- wp-includes/js/dist/block-library.js
- wp-includes/blocks/

Gutenberg Core Plugin:  For reference (non-minimized):
https://github.com/wordpress/gutenberg

Gutenberg Test are written in Jest framework.
https://jestjs.io/
(NOTE:   Most all Jest test need to be explicitly written as async )

When creating a new block/test, we can reference the following examples:
https://developer.wordpress.org/block-editor/reference-guides/packages/packages-e2e-test-utils/
https://github.com/WordPress/gutenberg/blob/b4f6baad345bd423f4107cb83b31f7a5d329cf4b/docs/how-to-guides/javascript/js-build-setup.md
https://github.com/WordPress/gutenberg-examples

NOTE:   Gutenberg tests that are NOT specific to Gutenberg will need to be written using Puppeteer specific commands.

# CI/CD E2E integration
For integration into E2E tests, we need to add the following code.  
NOTE: This is presently **NOT** done as it will add time to our CI deployment unnecessarily by spinning up an ENV, but then, not running any tests.
- When E2E tests become used locally, these commands will be utilized to add them to our .github actions commands
  https://github.com/WordPress/gutenberg/blob/trunk/.github/workflows/end2end-test.yml

# Wordpress/Gutenberg/E2E References:
https://www.npmjs.com/package/@wordpress/scripts
https://developer.wordpress.org/block-editor/reference-guides/packages/packages-e2e-tests/
https://developer.wordpress.org/block-editor/reference-guides/packages/packages-e2e-test-utils/
https://www.youtube.com/watch?v=pI1hGE3IFqc

Useful helper tests (also good for reference on Jest structure/formatting)
https://github.com/WordPress/gutenberg/tree/trunk/packages/e2e-test-utils/src

Plugin:
- install-plugin.js
- activate-plugin.js
- uninstall-plugin.js

User Logic:
- login-user.js
- get-current-user.js

Page interactions
- observe-focus-loss.js
- toggle-more-menu.js

Page setup:
- get-current-post-content.js
 