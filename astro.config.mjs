import { defineConfig } from "astro/config";

// https://astro.build/config
import tailwind from "@astrojs/tailwind";

// https://astro.build/config
import image from "@astrojs/image";

// https://astro.build/config
import sitemap from "@astrojs/sitemap";

// https://astro.build/config
import partytown from "@astrojs/partytown";

// https://astro.build/config
import prefetch from "@astrojs/prefetch";

// https://astro.build/config
import robotsTxt from "astro-robots-txt";

// https://astro.build/config
export default defineConfig({
  site: "https://burak.mulayim.app",
  integrations: [tailwind(), image({
    serviceEntryPoint: "@astrojs/image/sharp"
  }), sitemap(), partytown(), prefetch(), robotsTxt()]
});