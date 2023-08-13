import * as path from 'path'
import copy from 'rollup-plugin-copy'
import outputManifest, { KeyValueDecorator, OutputManifestParam } from 'rollup-plugin-output-manifest'
import { ConfigEnv, defineConfig, loadEnv, UserConfigExport } from 'vite'
import FullReload from 'vite-plugin-full-reload'

const assets = {
  base: 'resources',
  scripts: 'resources/scripts',
  styles: 'resources/styles'
}

const formatName = (name: string): string => name.replace(`${assets.scripts}/`, '').replace(/.css$/gm, '')

export default defineConfig(({ mode }: ConfigEnv) => {
  const devServerConfig = loadEnv(mode, process.cwd(), 'HMR')
  const dev = mode === 'development'
  const config: UserConfigExport = {
    appType: 'custom',
    publicDir: false,
    base: './',
    resolve: {
      alias: {
        '@': path.resolve(__dirname, assets.base),
        '@scripts': path.resolve(__dirname, assets.scripts),
        '@styles': path.resolve(__dirname, assets.styles)
      }
    },
    css: {
      devSourcemap: true
    },
    build: {
      sourcemap: false,
      manifest: false,
      outDir: 'public',
      assetsDir: '',
      rollupOptions: {
        input: {
          main: path.resolve(__dirname, `${assets.scripts}/main.ts`),
          editor: path.resolve(__dirname, `${assets.scripts}/editor.ts`)
        },
        output: {
          sourcemap: true
        },
        plugins: [
          outputManifest({
            fileName: 'manifest.json',
            generate: (keyValueDecorator: KeyValueDecorator, seed: object, opt: OutputManifestParam) => chunks =>
              chunks.reduce((manifest, { name, fileName }) => {
                return name
                  ? {
                      ...manifest,
                      ...keyValueDecorator(formatName(name), fileName, opt)
                    }
                  : manifest
              }, seed)
          }),
          outputManifest({
            fileName: 'entrypoints.json',
            nameWithExt: true,
            generate: (_: KeyValueDecorator, seed: object) => chunks =>
              chunks.reduce((manifest, { name, fileName }) => {
                const formatedName = name && formatName(name)
                const output = {}
                const js = formatedName && manifest[formatedName]?.js?.length ? manifest[formatedName].js : []
                const css = formatedName && manifest[formatedName]?.css?.length ? manifest[formatedName].css : []
                const dependencies = formatedName && manifest[formatedName] ? manifest[formatedName].dependencies : []
                const inject = { js, css, dependencies }

                fileName.match(/.js$/gm) && js.push(fileName)
                fileName.match(/.css$/gm) && css.push(fileName)

                name && (output[formatedName] = inject)

                return {
                  ...manifest,
                  ...output
                }
              }, seed)
          }),
          copy({
            copyOnce: true,
            hook: 'writeBundle',
            targets: [
              {
                src: path.resolve(__dirname, `${assets.base}/images/**/*`),
                dest: 'public/images'
              },
              {
                src: path.resolve(__dirname, `${assets.base}/svg/**/*`),
                dest: 'public/svg'
              },
              {
                src: path.resolve(__dirname, `${assets.base}/fonts/**/*`),
                dest: 'public/fonts'
              }
            ]
          })
        ]
      }
    },
    plugins: [FullReload(['resources/views/**/*', 'app/*', 'app/**/*'])]
  }

  if (dev) {
    config.server = {
      host: '0.0.0.0',
      origin: devServerConfig.HMR_ENTRYPOINT,
      strictPort: true,
      fs: {
        strict: true,
        allow: ['node_modules', assets.base]
      }
    }

    devServerConfig.HMR_HOST && (config.server.host = devServerConfig.HMR_HOST)
    devServerConfig.HMR_PORT && (config.server.port = parseInt(devServerConfig.HMR_PORT))
    devServerConfig.HMR_HTTPS_KEY &&
      devServerConfig.HMR_HTTPS_CERT &&
      (config.server.https = {
        key: devServerConfig.HMR_HTTPS_KEY,
        cert: devServerConfig.HMR_HTTPS_CERT
      })
  }

  return config
})
