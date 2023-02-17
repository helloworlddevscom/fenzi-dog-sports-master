# fenzi-wp-blocks
A library of Gutenberg blocks built by HelloWorldDevs for Fenzi sites. Right now this plugin is being built locally then pushed to git, aka the npm commands are run locally then the build is included in the git repo. This code included in the other fenzi projects by running a bash script (found in the other projects) which then git clones this repo as a plugin.

## Why render the block via PHP opposed to JS file?
Dynamic blocks are blocks that build their structure and content on the fly when the block is rendered on the front end. In order to accomplish this, they must be rendered via PHP. You can read more [here](https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/creating-dynamic-blocks/).

## Why separate a main block and additional blocks?
The development of a block-enabled plugin is a very well documented process in the WordPress Codex, packed with all the information one might need to get started. To date however, the documentation falls quite short in providing details on how a plugin should proceed to register two or more Gutenberg blocks by means of block.json configuration files. You can read more [here](https://luigicavalieri.com/blog/registering-multiple-gutenberg-blocks-using-block_json-files/).

## Helpful Block References
- [Create a block tutorial](https://developer.wordpress.org/block-editor/getting-started/create-block/)
- [Dynamic Blocks](https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/creating-dynamic-blocks/)
- [Registering Multiple Gutenberg Blocks Each Through its Own block.json File](https://luigicavalieri.com/blog/registering-multiple-gutenberg-blocks-using-block_json-files/)

## Project Structure
- `fenzi-wp-blocks/` (root)
- - `assets/` (folder for images, fonts, etc)
- - `build/` (build output aka generated via npm commands)
- - `src/` (main code)
- - - `main_block/` (contains 1 block which has all JS/CSS script includes in the block json)
- - - `additional_blocks/` (contains the rest of the blocks `WITHOUT` JS/CSS script includes in the block json)
- - - `scss/` (main scss styling that is eventually built to css via npm commands)-
- - - - `editor.scss` (scss styling that is only applied in the WP editor view, must manually add import for each block file)
- - - - `style.scss` (scss styling that is applied all the time, must manually add import for each block file)
- - - `index.js` (main js file, blocks are partially defined here in order to include the block-specific js for the editing views)
- - `.nvmrc` (nvm version helper)
- - `fenzi-wp-blocks.php` (main plugin file, here we define a new block category and we register block render functions)
- - `package.json` (standard dependencies)

## Typical Block Structure
The main `fenzi-wp-blocks.php` expects this format to automatically register block.
- `my_widget/` (root)
- - `block_template.html` (html file with simple replaced args used in sprintf in php)
- - `my-widget-block.json` (block definition, only the block in the main_block directory will have the JS/CSS includes otherwise WP complains about things being loaded twice)
- - `edit.js` (the view & logic for editing the block in the WP editor view)
- - `render.php` (function used to render the block on the public visible pages, function should be `fenzi_render_my_widget`)
- - `style.scss` (scss styling that is applied all the time, must manually add import for each block file to src/scss/style.scss)
- - `editor.scss` (scss styling that is only applied in the WP editor view, must manually add import for each block file to src/scss/editor.scss)

## Rough Steps to Create New Block By Copy/Paste
For creating a new block called 'My Widget'
- Copy an existing block in the `additional_blocks` directory and rename the directory `my_widget`.
- Rename the block.json file to `my-widget-block.json`
- Perform a find & replace in the new block direct for `my-old-widget` to `my-widget`. This will replace any styling classes and the name in the block.json.
- Renaming the function in `render.php` to `fenzi_render_my_widget`.
- Renaming the title in `my-widget-block.json`.
- Manually add import of `style.scss` to `src/scss/style.scss`.
- Manually add import of `editor.scss` to `src/scss/editor.scss`.
- Manually add registration of block to `src/index.js`.
- Run the command `npm run build`.

You should now have a "new" block ready to be used. You'll now want to edit the files as desired to achieve the functionality you desire. 

## Local Build Init
To init the plugin for block building you need dependencies locally, so you will need to run the following command from within the directory that has the package.json to build node_modules
`npm install`

## Build
To build the latest code for testing or release you will need to run the following command from within the directory that has the package.json
`npm run build`

## Versioning
Right now versioning is manually so try to remember to update the version number in `fenzi-wp-blocks.php` each time a new build & commit is made.
