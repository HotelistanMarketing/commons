# How to use?
Simply add this repository as a submodule and import files.

```shell
git submodule add https://github.com/HotelistanMarketing/commons
```

# Version History
Substantial changes (that would possibly require project modifications)
will be listed here.

## 2.7
- **form-validation.js** has been updated. Run gulp.
- Set `LEAD_DR` constant.
- (Optional) Rename `FORM_THANK_YOU_PAGE` constant as `FORM_RETURN_URL`.

## 2.6
- **composer.json** Set `ìnstaller_types` as `["custom-library"]` under "extra".
  Otherwise, Composer won't be able to download commons repo into the project root.

## 2.5
- **data.php** Use the provided enums instead of string assignments to avoid possible typos.
- **Autoloader** via Composer - modify include statements accordingly. 

## 2.4
Moved WhatsApp FAB script into **wp-fab.js**. Load it separately.

## 2.3
Added **optimize.js**. Use it for lazy JavaScript execution.
Change existing scripts' `src` attribute with `data-src` to make use of it.

## 2.2
Added a `PRODUCTION` constant whose value is dependent on an env var. 
Add `HOTELISTAN_DEV_MACHINE` environment variable to distinguish local development from production.

## 2.1
Added `get_webp(...)`, `get_pic_source_mq(...)`, and `get_2x_src(...)` functions.
Remove project functions to avoid conflicts.

## 2.0
For **wp-form.php** template, 
add a new `FORM_WP_LEAD_SOURCE_DETAIL` constant.

## 1.9
Visitor logging. No action is required.

## 1.8
**devtools/run-lessc.sh**, for post-deployment less compilation:
1. Add **Node.js buildpack** & **package.json**
   ```json
   {
       "name": "node-dependency-installer",
       "version": "0.1.0",
       "private": true,
       "scripts": {
           "postinstall": "cd commons/devtools && chmod +x run-lessc.sh && ./run-lessc.sh"
       },
       "dependencies": {
           "less": ">=4.2.0",
           "less-plugin-clean-css": ">=1.5.1"
       }
   }
   ```
2. Run `npm install`, and add **package.lock.json** to git
3. You may now remove compiled css files from git

## 1.7
- Use `get_localization(...)` to include localizations in a standardized way.

## 1.6
- **scripts/form-validation.php** changed to a **JS** file.<br>
  Include the JS in the body-end.

## 1.5
- Use **styles/generic.less** to commonize generic styles across projects.
- Use **scripts/fix-transition-glitch.js** along with generic styles to 
  fix Chrome's on load transitions. Add `preload` class to body to make it work.

## 1.4
- Common WhatsApp FAB localization.

## 1.3
- Removed analytics scripts from form templates.
  Instead, use `get_form_analytics_script(...)` before the body close tag.

## 1.2
- Use `get_wp_button(...)` to commonize **WhatsApp buttons** across projects.

## 1.1
- **scripts/faq-accordion.js** has been updated:
  Removed JQuery code. We may **remove JQuery** scripts from now on.


- **styles/faq-accordion.less** introduced:
  **Import this style** to make animations work.
  Additional style changes might be needed per project.

## 1.0
- **scripts/faq-accordion.js** has been updated:

  FAQs does not necessarily have one expanded item by default.