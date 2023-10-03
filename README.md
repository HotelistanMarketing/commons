# How to use?
Simply add this repository as a submodule and import files.

```shell
git submodule add https://github.com/HotelistanMarketing/commons
```

# Version History
Substantial changes (that would possibly require project modifications)
will be listed here.

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