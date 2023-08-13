# KOTA Wordpress Starter Theme

- Based on [Sage](https://roots.io/sage/) version [10](https://github.com/roots/sage/)
- Using [Vite](https://vitejs.dev) as the build tool / local server

## Requirements

- [Acorn](https://roots.io/acorn/docs/installation/) v3
- [PHP](https://secure.php.net/manual/en/install.php) >= 8.0 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
- [Composer](https://getcomposer.org/download/)
- [Vite](https://vitejs.dev) >= 3.1.0
- [Node.js](http://nodejs.org/) >= 16.0.0
- [Yarn](https://yarnpkg.com/en/docs/install)

---

## Recommended VS Code setup

To take full advantage of linting it is recommended to have the following VS Code extensions installed and active:

- Stylelint
- ESLint
- Laravel Blade formatter

To set up VS Code to auto-fix on save (based on this theme's rules) make sure the following setting is added to your VS Code settins:

```JSON
"editor.codeActionsOnSave": {
  "source.fixAll": true
}
```

---

## Theme structure

```sh
themes/your-theme-name/   # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── Providers/        # → Service providers
│   ├── View/             # → View models
│   ├── filters.php       # → Theme filters
│   ├── helpers.php       # → Global helpers
│   ├── kota.php          # → Project specific functions
│   ├── post-types.php    # → Registering post types
│   ├── setup.php         # → Theme setup
│   └── taxonomies.php    # → Registering taxonomies
├── composer.json         # → Autoloading for `app/` files
├── public/               # → Built theme assets (never edit)
├── functions.php         # → Theme bootloader
├── index.php             # → Theme template wrapper
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── fonts/            # → Theme fonts
│   ├── images/           # → Theme images
│   ├── scripts/          # → Theme javascript
│   ├── styles/           # → Theme stylesheets
│   ├── svg/              # → Theme svgs
│   └── views/            # → Theme templates
│       ├── components/   # → Component templates
│       ├── layouts/      # → Base templates
│       ├── partials/     # → Partial templates
        └── sections/     # → Section templates
├── screenshot.png        # → Theme screenshot for WP admin
├── style.css             # → Theme meta information
├── vendor/               # → Composer packages (never edit)
└── vite.config.ts        # → Vite configuration
```

---

## Theme development

- Run `yarn` from the theme directory to install dependencies
- Update `vite.config.ts` for bundler fine tuning

### Build commands

- `yarn dev` — Start dev server
- `yarn build` — Compile assets
- `yarn lint` — Lint stylesheets & javascripts
- `yarn lint:css` — Lint stylesheets
- `yarn lint:js` — Lint javascripts

---

## Hot module reloading

### Project Side (typically Bedrock / root of the project)

Add the following variables in your project `.env`

```sh
# If true hot reload is active
HMR_ENABLED=true

# Endpoint where the bundler serve your assets
HMR_ENTRYPOINT=http://example.test:3000
```

### Theme side

Add the following variables in your theme's `.env` - these will be the JavaScript .env variables that Vite uses to build and serve the project

```sh
# Dev server configuration
HMR_HOST='example.test'
HMR_PORT=3000
HMR_ENTRYPOINT=http://${HMR_HOST}:${HMR_PORT}

# Certificates for local SSL. Make sure to update HMR_ENTRYPOINT above to be `https`
# HMR_HTTPS_CERT=/Users/nat/.config/valet/Certificates/dka.test.crt
# HMR_HTTPS_KEY=/Users/nat/.config/valet/Certificates/dka.test.key
```


---

## Referencing assets

In CSS, you can reference assets using relative paths prefixed with an `@` alias, with the root for such paths being relative to the `/resources` directory. For example:

```css
@font-face {
  src: url('@/fonts/font-name.woff2') format('woff2');
}
```

Will resolve to `path/to/theme/resources/fonts/font-name.woff2`

---

## PostCSS

Plugins can be installed via yarn or NPM then added to `.postcssrc`

---

## Documentation

- [Sage documentation](https://roots.io/sage/docs/)
- [Controller documentation](https://github.com/soberwp/controller#usage)
- [Vite](https://vitejs.dev/guide/)
