import { defineConfig } from 'astro/config';
import starlight from '@astrojs/starlight';

export default defineConfig({
  integrations: [
    starlight({
      title: 'Filament Satis',
      logo: {
        src: './src/assets/logo.svg',
        replacesTitle: false,
      },
      social: {
        github: 'https://github.com/jeffersongoncalves/filament-satis',
      },
      sidebar: [
        {
          label: 'Getting Started',
          items: [
            { label: 'Installation', slug: 'getting-started/installation' },
            { label: 'Quick Start', slug: 'getting-started/quick-start' },
            { label: 'Configuration', slug: 'getting-started/configuration' },
          ],
        },
        {
          label: 'Guide',
          items: [
            { label: 'Packages', slug: 'guide/packages' },
            { label: 'Tokens', slug: 'guide/tokens' },
            { label: 'Satis Builds', slug: 'guide/satis-builds' },
            { label: 'Webhooks', slug: 'guide/webhooks' },
            { label: 'Downloads', slug: 'guide/downloads' },
            { label: 'Dependencies', slug: 'guide/dependencies' },
          ],
        },
        {
          label: 'Advanced',
          items: [
            { label: 'Multi-Tenancy', slug: 'advanced/multi-tenancy' },
            { label: 'Custom Models', slug: 'advanced/custom-models' },
            { label: 'Queue & Scheduling', slug: 'advanced/queue-config' },
            { label: 'Storage', slug: 'advanced/storage' },
          ],
        },
        {
          label: 'API Reference',
          items: [
            { label: 'Composer Endpoints', slug: 'api/composer-endpoints' },
            { label: 'Webhooks API', slug: 'api/webhooks-api' },
          ],
        },
        { label: 'Changelog', slug: 'changelog' },
      ],
      customCss: [],
    }),
  ],
});
